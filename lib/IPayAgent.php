<?php

namespace dface\IPayMasterPass;

class IPayAgent
{

	/** @var IPayAgentClient */
	private $agentClient;

	public function __construct(IPayAgentClient $agentClient)
	{
		$this->agentClient = $agentClient;
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
		$x = $this->agentClient->doRequest('Check', new ActionCheck($userId, $phoneNumber), ActionCheckResponse::class);
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
		$list = $this->agentClient->doRequest('List', new ActionList($userId, $phoneNumber), ActionListResponse::class);
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
		$x = $this->agentClient->doRequest('InitWidgetSession', $action, ActionInitWidgetSessionResponse::class);
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
		$x = $this->agentClient->doRequest('Invite', new ActionInvite($userId, $phoneNumber),
			ActionInviteResponse::class);
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
		$x = $this->agentClient->doRequest('InviteByURL',
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
		$x = $this->agentClient->doRequest('RegisterByURL',
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
		$x = $this->agentClient->doRequest('AddcardByURL',
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
		$x = $this->agentClient->doRequest('DeleteCard', new ActionDeleteCard($userId, $phoneNumber, $card_alias),
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
		$x = $this->agentClient->doRequest('Otp', new ActionOtp($userId, $phoneNumber, $token, $received_code),
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
		return $this->agentClient->doRequest('PaymentCreate', $create, ActionPaymentResponse::class);
	}

	/**
	 * @param ActionPaymentSale $confirm
	 * @return ActionPaymentResponse
	 * @throws IPayAgentError
	 */
	public function salePayment(ActionPaymentSale $confirm) : ActionPaymentResponse
	{
		return $this->agentClient->doRequest('PaymentSale', $confirm, ActionPaymentResponse::class);
	}

	/**
	 * @param ActionPaymentCancel $cancel
	 * @return ActionPaymentResponse
	 * @throws IPayAgentError
	 */
	public function cancelPayment(ActionPaymentCancel $cancel) : ActionPaymentResponse
	{
		return $this->agentClient->doRequest('PaymentCancel', $cancel, ActionPaymentResponse::class);
	}

	/**
	 * @param string $userId
	 * @param string $phoneNumber
	 * @param string $paymentId
	 * @return ActionPaymentResponse[]|array
	 * @throws IPayAgentError
	 */
	public function paymentStatus(string $userId, string $phoneNumber, string $paymentId) : array
	{
		return $this->agentClient->doRequest('StatusRequest',
			new ActionPaymentStatusRequest($userId, $phoneNumber, $paymentId),
			StatusResponseItem::class.'[]');
	}

}
