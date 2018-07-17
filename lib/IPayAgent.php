<?php

namespace dface\IPayMasterPass;

use Psr\Log\LoggerInterface;

class IPayAgent
{

	/** @var AgentSettings */
	private $settings;
	/** @var IPayHttpClient */
	private $client;
	/** @var LoggerInterface */
	private $logger;
	/** @var IPayTimeService */
	private $timeService;

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
	 * @param string $userId
	 * @param string $phoneNumber
	 * @return string
	 * @throws IPayAgentError
	 */
	public function getUserStatus(string $userId, string $phoneNumber) : string
	{
		/** @var ActionCheckResponse $x */
		$x = $this->doRequest('Check', new ActionCheck($userId, $phoneNumber), ActionCheckResponse::class);
		return $x->getUserStatus();
	}

	/**
	 * @param string $userId
	 * @param string $phoneNumber
	 * @return CardInfo[]
	 * @throws IPayAgentError
	 */
	public function getCardList(string $userId, string $phoneNumber) : array
	{
		/** @var ActionListResponse $list */
		$list = $this->doRequest('List', new ActionList($userId, $phoneNumber), ActionListResponse::class);
		return array_values($list->getCards());
	}

	/**
	 * @param string $userId
	 * @param string $phoneNumber
	 * @param $info
	 * @param null|string $description
	 * @return string
	 * @throws IPayAgentError
	 */
	public function initWidgetSession(string $userId, string $phoneNumber, $info, ?string $description) : string
	{
		$action = new ActionInitWidgetSession($userId, $phoneNumber, $info, $description);
		/** @var ActionInitWidgetSessionResponse $x */
		$x = $this->doRequest('InitWidgetSession', $action, ActionInitWidgetSessionResponse::class);
		return $x->getSession();
	}

	/**
	 * @param string $userId
	 * @param string $phoneNumber
	 * @return string
	 * @throws IPayAgentError
	 */
	public function invite(string $userId, string $phoneNumber) : string
	{
		/** @var ActionInviteResponse $x */
		$x = $this->doRequest('Invite', new ActionInvite($userId, $phoneNumber), ActionInviteResponse::class);
		return $x->getToken();
	}

	/**
	 * @param string $userId
	 * @param string $phoneNumber
	 * @param string $lang
	 * @param string $success_url
	 * @param string $error_url
	 * @return string
	 * @throws IPayAgentError
	 */
	public function inviteByUrl(
		string $userId,
		string $phoneNumber,
		string $lang,
		string $success_url,
		string $error_url
	) : string {
		/** @var ActionInviteByUrlResponse $x */
		$x = $this->doRequest('InviteByURL',
			new ActionInviteByUrl($userId, $phoneNumber, $lang, $success_url, $error_url),
			ActionInviteByUrlResponse::class);
		return $x->getUrl();
	}

	/**
	 * @param string $userId
	 * @param string $phoneNumber
	 * @param string $lang
	 * @param string $success_url
	 * @param string $error_url
	 * @return string
	 * @throws IPayAgentError
	 */
	public function registerByUrl(
		string $userId,
		string $phoneNumber,
		string $lang,
		string $success_url,
		string $error_url
	) : string {
		/** @var ActionRegisterByUrlResponse $x */
		$x = $this->doRequest('RegisterByURL',
			new ActionRegisterByUrl($userId, $phoneNumber, $lang, $success_url, $error_url),
			ActionRegisterByUrlResponse::class);
		return $x->getUrl();
	}

	/**
	 * @param string $userId
	 * @param string $phoneNumber
	 * @param string $lang
	 * @param string $success_url
	 * @param string $error_url
	 * @return string
	 * @throws IPayAgentError
	 */
	public function addCardByUrl(
		string $userId,
		string $phoneNumber,
		string $lang,
		string $success_url,
		string $error_url
	) : string {
		/** @var ActionAddCardByUrlResponse $x */
		/** @noinspection SpellCheckingInspection */
		$x = $this->doRequest('AddcardByURL',
			new ActionAddCardByUrl($userId, $phoneNumber, $lang, $success_url, $error_url),
			ActionAddCardByUrlResponse::class);
		return $x->getUrl();
	}

	/**
	 * @param string $userId
	 * @param string $phoneNumber
	 * @param string $card_alias
	 * @return bool
	 * @throws IPayAgentError
	 */
	public function deleteCard(string $userId, string $phoneNumber, string $card_alias) : bool
	{
		/** @var ActionDeleteCardResponse $x */
		$x = $this->doRequest('DeleteCard', new ActionDeleteCard($userId, $phoneNumber, $card_alias),
			ActionDeleteCardResponse::class);
		return $x->getStatus() === 'OK';
	}

	/**
	 * @param string $userId
	 * @param string $phoneNumber
	 * @param string $token
	 * @param string $received_code
	 * @return bool
	 * @throws IPayAgentError
	 */
	public function otp(string $userId, string $phoneNumber, string $token, string $received_code) : bool
	{
		/** @var ActionOtpResponse $x */
		$x = $this->doRequest('Otp', new ActionOtp($userId, $phoneNumber, $token, $received_code),
			ActionOtpResponse::class);
		return $x->getStatus() === 'OK';
	}

	/**
	 * @param string $userId
	 * @param string $userPhone
	 * @param string $paymentId
	 * @param int $amount
	 * @param string $cardAlias
	 * @param string $description
	 * @return ActionPaymentResponse
	 * @throws IPayAgentError
	 */
	public function createPayment(
		string $userId,
		string $userPhone,
		string $paymentId,
		int $amount,
		string $cardAlias,
		string $description
	) : ActionPaymentResponse {
		$create = new ActionPaymentCreate(
			$userId,
			$userPhone,
			$paymentId,
			$amount,
			$cardAlias,
			new ActionPmtInfo($userPhone, $amount),
			$description);
		return $this->doRequest('PaymentCreate', $create, ActionPaymentResponse::class);
	}

	/**
	 * @param ActionPaymentSale $confirm
	 * @return ActionPaymentResponse
	 * @throws IPayAgentError
	 */
	public function salePayment(ActionPaymentSale $confirm) : ActionPaymentResponse
	{
		return $this->doRequest('PaymentSale', $confirm, ActionPaymentResponse::class);
	}

	/**
	 * @param ActionPaymentCancel $cancel
	 * @return ActionPaymentResponse
	 * @throws IPayAgentError
	 */
	public function cancelPayment(ActionPaymentCancel $cancel) : ActionPaymentResponse
	{
		return $this->doRequest('PaymentCancel', $cancel, ActionPaymentResponse::class);
	}

	/**
	 * @param string $userId
	 * @param string $phoneNumber
	 * @param string $paymentId
	 * @return mixed
	 * @throws IPayAgentError
	 */
	public function paymentStatus(string $userId, string $phoneNumber, string $paymentId)
	{
		return $this->doRequest('StatusRequest', new ActionPaymentStatusRequest($userId, $phoneNumber, $paymentId),
			ActionPaymentResponse::class);
	}

	/**
	 * @param string $actionName
	 * @param \JsonSerializable $action
	 * @param string $responseClass
	 * @return mixed
	 * @throws IPayAgentError
	 */
	private function doRequest(string $actionName, \JsonSerializable $action, string $responseClass)
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
