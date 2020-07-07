<?php
/* author: Ponomarev Denis <ponomarev@gmail.com> */

namespace dface\IPayMasterPass;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Log\LoggerInterface;

class IPayAgentClient
{

	/** @var AgentSettings */
	private $settings;
	/** @var ClientInterface */
	private $client;
	/** @var ServerRequestFactoryInterface */
	private $requestFactory;
	/** @var callable */
	private $stringStreamFactory;
	/** @var LoggerInterface */
	private $logger;
	/** @var IPayTimeService */
	private $timeService;
	/** @var IPayAgentSigner */
	private $agentSigner;

	public function __construct(
		AgentSettings $settings,
		ClientInterface $client,
		ServerRequestFactoryInterface $requestFactory,
		callable $stringStreamFactory,
		LoggerInterface $logger,
		IPayTimeService $timeService,
		IPayAgentSigner $agentSigner
	) {
		$this->settings = $settings;
		$this->client = $client;
		$this->requestFactory = $requestFactory;
		$this->stringStreamFactory = $stringStreamFactory;
		$this->logger = $logger;
		$this->timeService = $timeService;
		$this->agentSigner = $agentSigner;
	}

	/**
	 * @param string $actionName
	 * @param \JsonSerializable $action
	 * @param string $responseClass
	 * @return mixed
	 * @throws IPayAgentError
	 */
	public function doRequest(string $actionName, \JsonSerializable $action, string $responseClass)
	{

		$time = $this->timeService->getCurrentTime();
		$sign = $this->agentSigner->sign($time);
		$auth = new RequestAuth($this->settings->getMerchantId(), $time, $sign);
		$request = new Request($auth, $actionName, $action);

		$request_arr = ['request' => $request->jsonSerialize()];

		$json_request = \json_encode($request_arr, JSON_UNESCAPED_UNICODE);
		if ($json_request === null) {
			$log_req = \print_r($request, true);
			$err_msg = \json_last_error_msg();
			$this->logger->error("Cant json-serialize '$actionName' request: $log_req, \n$err_msg");
			throw new IPayAgentError('Invalid Request');
		}

		$log_data = $request_arr;
		unset($log_data['request']['auth']);
		$this->logger->info("$actionName: ".\json_encode($log_data, JSON_UNESCAPED_UNICODE));

		try{
			$body_stream = ($this->stringStreamFactory)($json_request);
			$http_request = $this->requestFactory
				->createServerRequest('POST', $this->settings->getUrl())
				->withBody($body_stream);
			$http_response = $this->client->sendRequest($http_request);
			$response_json = $http_response->getBody()->getContents();
			$this->logger->info("$actionName: $response_json");
		}catch (\Throwable $e){
			$this->logger->error("'$actionName' failed: ".$e->getMessage(), [$e]);
			throw new IPayAgentError("'$actionName' failed: ".$e->getMessage()."\n");
		}

		$response_arr = \json_decode($response_json, true);
		if ($response_arr === null) {
			$this->logger->error("Invalid '$actionName' response format");
			throw new IPayAgentError("Invalid '$actionName' response format");
		}

		if (!isset($response_arr['response'])) {
			$this->logger->error("Invalid '$actionName' response format");
			throw new IPayAgentError("Invalid '$actionName' response format");
		}

		$response_body = $response_arr['response'];

		if (isset($response_body['error'])) {
			throw new IPayAgentError($response_body['error']);
		}

		try{
			if (\substr($responseClass, -2) === '[]') {
				$itemClass = \substr($responseClass, 0, -2);
				$result = [];
				foreach ($response_body as $item) {
					/** @noinspection PhpUndefinedMethodInspection */
					$result[] = $itemClass::deserialize($item);
				}
				return $result;
			}
			/** @noinspection PhpUndefinedMethodInspection */
			return $responseClass::deserialize($response_body);
		}catch (\Exception $e){
			throw new IPayAgentError("Invalid '$actionName' response format: ".$e->getMessage());
		}

	}

}
