<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class P2PActionPaymentResponseInfo implements \JsonSerializable {

	/** @var string */
	private $sender_phone;
	/** @var string */
	private $sender_card;
	/** @var string */
	private $target_card;
	/** @var int */
	private $invoice;
	/** @var int */
	private $amount;
	/** @var string */
	private $currency;
	/** @var int */
	private $notification_cost;
	/** @var mixed[] */
	private $notifications;

	public function __construct(
		string $sender_phone,
		string $sender_card,
		string $target_card,
		int $invoice,
		int $amount,
		string $currency,
		int $notification_cost,
		array $notifications
	){
		$this->sender_phone = $sender_phone;
		$this->sender_card = $sender_card;
		$this->target_card = $target_card;
		$this->invoice = $invoice;
		$this->amount = $amount;
		$this->currency = $currency;
		$this->notification_cost = $notification_cost;
		$this->notifications = $notifications;
	}

	/**
	 * @return string
	 */
	public function getSenderPhone() : string {
		return $this->sender_phone;
	}

	/**
	 * @return string
	 */
	public function getSenderCard() : string {
		return $this->sender_card;
	}

	/**
	 * @return string
	 */
	public function getTargetCard() : string {
		return $this->target_card;
	}

	/**
	 * @return int
	 */
	public function getInvoice() : int {
		return $this->invoice;
	}

	/**
	 * @return int
	 */
	public function getAmount() : int {
		return $this->amount;
	}

	/**
	 * @return string
	 */
	public function getCurrency() : string {
		return $this->currency;
	}

	/**
	 * @return int
	 */
	public function getNotificationCost() : int {
		return $this->notification_cost;
	}

	/**
	 * @return mixed[]
	 */
	public function getNotifications() : array {
		return $this->notifications;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['sender_phone'] = $this->sender_phone;

		$result['sender_card'] = $this->sender_card;

		$result['target_card'] = $this->target_card;

		$result['invoice'] = $this->invoice;

		$result['amount'] = $this->amount;

		$result['currency'] = $this->currency;

		$result['notification_cost'] = $this->notification_cost;

		$result['notifications'] = \array_map(function ( $x){
			return $x;
		}, $this->notifications);

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : P2PActionPaymentResponseInfo {
		if(\array_key_exists('sender_phone', $arr)){
			$sender_phone = $arr['sender_phone'];
		}else{
			throw new \InvalidArgumentException("Property 'sender_phone' not specified");
		}
		$sender_phone = $sender_phone !== null ? (string)$sender_phone : null;

		if(\array_key_exists('sender_card', $arr)){
			$sender_card = $arr['sender_card'];
		}else{
			throw new \InvalidArgumentException("Property 'sender_card' not specified");
		}
		$sender_card = $sender_card !== null ? (string)$sender_card : null;

		if(\array_key_exists('target_card', $arr)){
			$target_card = $arr['target_card'];
		}else{
			throw new \InvalidArgumentException("Property 'target_card' not specified");
		}
		$target_card = $target_card !== null ? (string)$target_card : null;

		if(\array_key_exists('invoice', $arr)){
			$invoice = $arr['invoice'];
		}else{
			throw new \InvalidArgumentException("Property 'invoice' not specified");
		}
		$invoice = $invoice !== null ? (int)$invoice : null;

		if(\array_key_exists('amount', $arr)){
			$amount = $arr['amount'];
		}else{
			throw new \InvalidArgumentException("Property 'amount' not specified");
		}
		$amount = $amount !== null ? (int)$amount : null;

		if(\array_key_exists('currency', $arr)){
			$currency = $arr['currency'];
		}else{
			throw new \InvalidArgumentException("Property 'currency' not specified");
		}
		$currency = $currency !== null ? (string)$currency : null;

		if(\array_key_exists('notification_cost', $arr)){
			$notification_cost = $arr['notification_cost'];
		}else{
			throw new \InvalidArgumentException("Property 'notification_cost' not specified");
		}
		$notification_cost = $notification_cost !== null ? (int)$notification_cost : null;

		if(\array_key_exists('notifications', $arr)){
			$notifications = $arr['notifications'];
		}else{
			throw new \InvalidArgumentException("Property 'notifications' not specified");
		}
		$notifications = $notifications !== null ? \array_map(function ($x){
						return $x;
		}, $notifications) : null;

		return new static($sender_phone, $sender_card, $target_card, $invoice, $amount, $currency, $notification_cost, $notifications);
	}

}
