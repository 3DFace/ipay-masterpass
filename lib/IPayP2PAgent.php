<?php

namespace dface\IPayMasterPass;

class IPayP2PAgent
{

	private IPayAgentClient $agentClient;

	public function __construct(IPayAgentClient $agentClient)
	{
		$this->agentClient = $agentClient;
	}

	/**
	 * @param string $userId
	 * @param string $userPhone
	 * @param int $amount
	 * @param string $currency
	 * @param string $cardAlias
	 * @param string $targetCardNum
	 * @param P2PPaymentNotification[] $notifications
	 * @return P2PActionPaymentResponse
	 * @throws IPayAgentError
	 */
	public function createPayment(
		string $userId,
		string $userPhone,
		int $amount,
		string $currency,
		string $cardAlias,
		string $targetCardNum,
		array $notifications
	) : P2PActionPaymentResponse {
		$create = new P2PActionPaymentCreate(
			$userId,
			$userPhone,
			new P2PPaymentSender($cardAlias),
			new P2PPaymentTarget($targetCardNum),
			new P2PPaymentFunds($amount, $currency),
			$notifications);
		return $this->agentClient->doRequest('PaymentCreate', $create, ActionPaymentResponse::class);
	}

	/**
	 * @param P2PActionPaymentSale $confirm
	 * @return P2PActionPaymentResponse
	 * @throws IPayAgentError
	 */
	public function salePayment(P2PActionPaymentSale $confirm) : P2PActionPaymentResponse
	{
		return $this->agentClient->doRequest('PaymentSale', $confirm, ActionPaymentResponse::class);
	}

	/**
	 * @param string $userId
	 * @param string $phoneNumber
	 * @param string $paymentId
	 * @return P2PActionPaymentResponse
	 * @throws IPayAgentError
	 */
	public function paymentStatus(string $userId, string $phoneNumber, string $paymentId) : P2PActionPaymentResponse
	{
		return $this->agentClient->doRequest('StatusRequest',
			new ActionPaymentStatusRequest($userId, $phoneNumber, $paymentId),
			P2PActionPaymentResponse::class);
	}

}
