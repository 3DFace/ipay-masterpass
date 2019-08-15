<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class P2PActionPaymentCreate implements \JsonSerializable {

	/** @var string */
	private $user_id;
	/** @var string */
	private $msisdn;
	/** @var P2PPaymentSender */
	private $sender;
	/** @var P2PPaymentTarget */
	private $target;
	/** @var P2PPaymentFunds */
	private $funds;
	/** @var P2PPaymentNotification[] */
	private $notifications;

	public function __construct(
		string $user_id,
		string $msisdn,
		P2PPaymentSender $sender,
		P2PPaymentTarget $target,
		P2PPaymentFunds $funds,
		array $notifications
	){
		$this->user_id = $user_id;
		$this->msisdn = $msisdn;
		$this->sender = $sender;
		$this->target = $target;
		$this->funds = $funds;
		$this->notifications = $notifications;
	}

	/**
	 * @return string
	 */
	public function getUserId() : string {
		return $this->user_id;
	}

	/**
	 * @return string
	 */
	public function getMsisdn() : string {
		return $this->msisdn;
	}

	/**
	 * @return P2PPaymentSender
	 */
	public function getSender() : P2PPaymentSender {
		return $this->sender;
	}

	/**
	 * @return P2PPaymentTarget
	 */
	public function getTarget() : P2PPaymentTarget {
		return $this->target;
	}

	/**
	 * @return P2PPaymentFunds
	 */
	public function getFunds() : P2PPaymentFunds {
		return $this->funds;
	}

	/**
	 * @return P2PPaymentNotification[]
	 */
	public function getNotifications() : array {
		return $this->notifications;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['user_id'] = $this->user_id;

		$result['msisdn'] = $this->msisdn;

		$result['sender'] = $this->sender->jsonSerialize();

		$result['target'] = $this->target->jsonSerialize();

		$result['funds'] = $this->funds->jsonSerialize();

		$result['notifications'] = \array_map(function (P2PPaymentNotification $x){
			return $x->jsonSerialize();
		}, $this->notifications);

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : P2PActionPaymentCreate {
		if(\array_key_exists('user_id', $arr)){
			$user_id = $arr['user_id'];
		}else{
			throw new \InvalidArgumentException("Property 'user_id' not specified");
		}
		$user_id = $user_id !== null ? (string)$user_id : null;

		if(\array_key_exists('msisdn', $arr)){
			$msisdn = $arr['msisdn'];
		}else{
			throw new \InvalidArgumentException("Property 'msisdn' not specified");
		}
		$msisdn = $msisdn !== null ? (string)$msisdn : null;

		if(\array_key_exists('sender', $arr)){
			$sender = $arr['sender'];
		}else{
			throw new \InvalidArgumentException("Property 'sender' not specified");
		}
		try {
			$sender = $sender !== null ? P2PPaymentSender::deserialize($sender) : null;
		}catch (\Exception $e){
			throw new \InvalidArgumentException('Deserialization error: '.$e->getMessage(), 0, $e);
		}

		if(\array_key_exists('target', $arr)){
			$target = $arr['target'];
		}else{
			throw new \InvalidArgumentException("Property 'target' not specified");
		}
		try {
			$target = $target !== null ? P2PPaymentTarget::deserialize($target) : null;
		}catch (\Exception $e){
			throw new \InvalidArgumentException('Deserialization error: '.$e->getMessage(), 0, $e);
		}

		if(\array_key_exists('funds', $arr)){
			$funds = $arr['funds'];
		}else{
			throw new \InvalidArgumentException("Property 'funds' not specified");
		}
		try {
			$funds = $funds !== null ? P2PPaymentFunds::deserialize($funds) : null;
		}catch (\Exception $e){
			throw new \InvalidArgumentException('Deserialization error: '.$e->getMessage(), 0, $e);
		}

		if(\array_key_exists('notifications', $arr)){
			$notifications = $arr['notifications'];
		}else{
			throw new \InvalidArgumentException("Property 'notifications' not specified");
		}
		$notifications = $notifications !== null ? \array_map(function ($x){
			try {
				$x = $x !== null ? P2PPaymentNotification::deserialize($x) : null;
			}catch (\Exception $e){
				throw new \InvalidArgumentException('Deserialization error: '.$e->getMessage(), 0, $e);
			}
			return $x;
		}, $notifications) : null;

		return new static($user_id, $msisdn, $sender, $target, $funds, $notifications);
	}

}
