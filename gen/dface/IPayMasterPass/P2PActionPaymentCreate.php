<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class P2PActionPaymentCreate implements JsonSerializable {

	private string $user_id;
	private string $msisdn;
	private P2PPaymentSender $sender;
	private P2PPaymentTarget $target;
	private P2PPaymentFunds $funds;
	private array $notifications;
	private bool $_dirty = false;

	/**
	 * @param string $user_id
	 * @param string $msisdn
	 * @param P2PPaymentSender $sender
	 * @param P2PPaymentTarget $target
	 * @param P2PPaymentFunds $funds
	 * @param P2PPaymentNotification[] $notifications
	 */
	public function __construct(
		string $user_id,
		string $msisdn,
		P2PPaymentSender $sender,
		P2PPaymentTarget $target,
		P2PPaymentFunds $funds,
		array $notifications
	) {
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
	 * @return array|\stdClass
	 */
	public function jsonSerialize() {

		$result = [];

		$result['user_id'] = $this->user_id;

		$result['msisdn'] = $this->msisdn;

		$result['sender'] = $this->sender->jsonSerialize();

		$result['target'] = $this->target->jsonSerialize();

		$result['funds'] = $this->funds->jsonSerialize();

		$result['notifications'] = \array_map(static function (P2PPaymentNotification $x) {
			return $x->jsonSerialize();
		}, $this->notifications);

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize($data) : self {
		$arr = (array)$data;
		if (\array_key_exists('user_id', $arr)) {
			$user_id = $arr['user_id'];
		} else {
			throw new \InvalidArgumentException("Property 'user_id' not specified");
		}
		$user_id = $user_id === null ? null : (string)$user_id;

		if (\array_key_exists('msisdn', $arr)) {
			$msisdn = $arr['msisdn'];
		} else {
			throw new \InvalidArgumentException("Property 'msisdn' not specified");
		}
		$msisdn = $msisdn === null ? null : (string)$msisdn;

		if (\array_key_exists('sender', $arr)) {
			$sender = $arr['sender'];
		} else {
			throw new \InvalidArgumentException("Property 'sender' not specified");
		}
		$sender = $sender === null ? null : P2PPaymentSender::deserialize($sender);

		if (\array_key_exists('target', $arr)) {
			$target = $arr['target'];
		} else {
			throw new \InvalidArgumentException("Property 'target' not specified");
		}
		$target = $target === null ? null : P2PPaymentTarget::deserialize($target);

		if (\array_key_exists('funds', $arr)) {
			$funds = $arr['funds'];
		} else {
			throw new \InvalidArgumentException("Property 'funds' not specified");
		}
		$funds = $funds === null ? null : P2PPaymentFunds::deserialize($funds);

		if (\array_key_exists('notifications', $arr)) {
			$notifications = $arr['notifications'];
		} else {
			throw new \InvalidArgumentException("Property 'notifications' not specified");
		}
		$notifications = $notifications === null ? null : \array_map(static function ($x) {
			return $x === null ? null : P2PPaymentNotification::deserialize($x);
		}, $notifications);

		return new self(
			$user_id,
			$msisdn,
			$sender,
			$target,
			$funds,
			$notifications);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->user_id === $x->user_id

			&& $this->msisdn === $x->msisdn

			&& $this->sender->equals($x->sender)

			&& $this->target->equals($x->target)

			&& $this->funds->equals($x->funds)

			&& \count($this->notifications) === \count($x->notifications)
			&& (static function ($arr1, $arr2) {
				foreach ($arr1 as $i => $v1) {
					if (!isset($arr2[$i])) {
						return false;
					}
					$v2 = $arr2[$i];
					$v_eq = $v1->equals($v2);
					if (!$v_eq) {
						return false;
					}
				}
				return true;
			})($this->notifications, $x->notifications);
	}

	public function isDirty() : bool {
		return $this->_dirty;
	}

	/**
	 * @return self
	 */
	public function washed() : self {
		if (!$this->_dirty) {
			return $this;
		}
		$x = clone $this;
		$x->_dirty = false;
		return $x;
	}

}
