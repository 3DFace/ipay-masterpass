<?php

namespace dface\IPayMasterPass;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Log\LoggerInterface;

class IPayAgentClient
{

	private AgentSettings $settings;
	private ClientInterface $client;
	private RequestFactoryInterface $requestFactory;
	private StreamFactoryInterface $streamFactory;
	private LoggerInterface $logger;
	private IPayTimeService $timeService;
	private IPayAgentSigner $agentSigner;

	public function __construct(
		AgentSettings $settings,
		ClientInterface $client,
		RequestFactoryInterface $requestFactory,
		StreamFactoryInterface $streamFactory,
		LoggerInterface $logger,
		IPayTimeService $timeService,
		IPayAgentSigner $agentSigner
	) {
		$this->settings = $settings;
		$this->client = $client;
		$this->requestFactory = $requestFactory;
		$this->streamFactory = $streamFactory;
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

		try {
			$json_request = \json_encode($request_arr, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
			$log_data = $request_arr;
			unset($log_data['request']['auth']);
			$this->logger->info("$actionName: ".\json_encode($log_data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE));
		} catch (\JsonException $e) {
			$err_msg = $e->getMessage();
			$this->logger->error("Cant json-serialize '$actionName' request: \n$err_msg");
			throw new IPayAgentError('Invalid Request');
		}

		try{
			$body_stream = $this->streamFactory->createStream($json_request);
			$http_request = $this->requestFactory
				->createRequest('POST', $this->settings->getUrl())
				->withBody($body_stream);
			$http_response = $this->client->sendRequest($http_request);
			$response_json = $http_response->getBody()->getContents();
			$this->logger->info("$actionName: $response_json");
		}catch (\Throwable $e){
			$this->logger->error("'$actionName' failed: ".$e->getMessage(), [$e]);
			throw new IPayAgentError("'$actionName' failed: ".$e->getMessage()."\n");
		}

		try {
			$response_arr = \json_decode($response_json, true, 512, JSON_THROW_ON_ERROR);
		} catch (\JsonException $e) {
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
