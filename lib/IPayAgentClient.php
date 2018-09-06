<?php
/* author: Ponomarev Denis <ponomarev@gmail.com> */

namespace dface\IPayMasterPass;

use Psr\Log\LoggerInterface;

class IPayAgentClient
{

	/** @var AgentSettings */
	private $settings;
	/** @var IPayHttpClient */
	private $client;
	/** @var LoggerInterface */
	private $logger;
	/** @var IPayTimeService */
	private $timeService;

	/**
	 * @param AgentSettings $settings
	 * @param IPayHttpClient $client
	 * @param LoggerInterface $logger
	 * @param IPayTimeService $timeService
	 */
	public function __construct(
		AgentSettings $settings,
		IPayHttpClient $client,
		LoggerInterface $logger,
		IPayTimeService $timeService
	) {
		$this->settings = $settings;
		$this->client = $client;
		$this->logger = $logger;
		$this->timeService = $timeService;
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
		$sign = md5($time->format('Y-m-d H:i:s').$this->settings->getSignKey());
		$auth = new RequestAuth($this->settings->getMerchantId(), $time, $sign);
		$request = new Request($auth, $actionName, $action);

		$request_arr = ['request' => $request->jsonSerialize()];

		$json_request = json_encode($request_arr, JSON_UNESCAPED_UNICODE);
		if($json_request === null){
			$log_req = print_r($request, true);
			$err_msg = json_last_error_msg();
			$this->logger->error("Cant json-serialize '$actionName' request: $log_req, \n$err_msg");
			throw new IPayAgentError('Invalid Request');
		}

		$log_data = $request_arr;
		unset($log_data['request']['auth']);
		$this->logger->info("$actionName: ".json_encode($log_data, JSON_UNESCAPED_UNICODE));

		try{
			$response_json = $this->client->post($this->settings->getUrl(), $json_request);
			$this->logger->info("$actionName: $response_json");
		}catch (\Exception $e){
			$this->logger->error("'$actionName' failed: ".$e->getMessage(), [$e]);
			throw new IPayAgentError("'$actionName' failed: ".$e->getMessage()."\n");
		}

		$response_arr = json_decode($response_json, true);
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
			/** @noinspection PhpUndefinedMethodInspection */
			return $responseClass::deserialize($response_body);
		}catch (\Exception $e){
			throw new IPayAgentError("Invalid '$actionName' response format: ".$e->getMessage());
		}

	}

}
