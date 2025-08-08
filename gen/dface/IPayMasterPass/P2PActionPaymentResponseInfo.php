<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class P2PActionPaymentResponseInfo implements JsonSerializable {

	private string $sender_phone;
	private string $sender_card;
	private string $target_card;
	private int $invoice;
	private int $amount;
	private string $currency;
	private int $notification_cost;
	private array $notifications;
	private bool $_dirty = false;

	/**
	 * @param string $sender_phone
	 * @param string $sender_card
	 * @param string $target_card
	 * @param int $invoice
	 * @param int $amount
	 * @param string $currency
	 * @param int $notification_cost
	 * @param array $notifications
	 */
	public function __construct(
		string $sender_phone,
		string $sender_card,
		string $target_card,
		int $invoice,
		int $amount,
		string $currency,
		int $notification_cost,
		array $notifications
	) {
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
	 * @return array
	 */
	public function getNotifications() : array {
		return $this->notifications;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['sender_phone'] = $this->sender_phone;

		$result['sender_card'] = $this->sender_card;

		$result['target_card'] = $this->target_card;

		$result['invoice'] = $this->invoice;

		$result['amount'] = $this->amount;

		$result['currency'] = $this->currency;

		$result['notification_cost'] = $this->notification_cost;

		$result['notifications'] = \array_map(static function ($x) {
			return $x;
		}, $this->notifications);

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		if (\array_key_exists('sender_phone', $arr)) {
			$sender_phone = $arr['sender_phone'];
		} else {
			throw new \InvalidArgumentException("Property 'sender_phone' not specified");
		}
		$sender_phone = $sender_phone === null ? null : (string)$sender_phone;

		if (\array_key_exists('sender_card', $arr)) {
			$sender_card = $arr['sender_card'];
		} else {
			throw new \InvalidArgumentException("Property 'sender_card' not specified");
		}
		$sender_card = $sender_card === null ? null : (string)$sender_card;

		if (\array_key_exists('target_card', $arr)) {
			$target_card = $arr['target_card'];
		} else {
			throw new \InvalidArgumentException("Property 'target_card' not specified");
		}
		$target_card = $target_card === null ? null : (string)$target_card;

		if (\array_key_exists('invoice', $arr)) {
			$invoice = $arr['invoice'];
		} else {
			throw new \InvalidArgumentException("Property 'invoice' not specified");
		}
		$invoice = $invoice === null ? null : (int)$invoice;

		if (\array_key_exists('amount', $arr)) {
			$amount = $arr['amount'];
		} else {
			throw new \InvalidArgumentException("Property 'amount' not specified");
		}
		$amount = $amount === null ? null : (int)$amount;

		if (\array_key_exists('currency', $arr)) {
			$currency = $arr['currency'];
		} else {
			throw new \InvalidArgumentException("Property 'currency' not specified");
		}
		$currency = $currency === null ? null : (string)$currency;

		if (\array_key_exists('notification_cost', $arr)) {
			$notification_cost = $arr['notification_cost'];
		} else {
			throw new \InvalidArgumentException("Property 'notification_cost' not specified");
		}
		$notification_cost = $notification_cost === null ? null : (int)$notification_cost;

		if (\array_key_exists('notifications', $arr)) {
			$notifications = $arr['notifications'];
		} else {
			throw new \InvalidArgumentException("Property 'notifications' not specified");
		}
		$notifications = $notifications === null ? null : \array_map(static function ($x) {
			return $x;
		}, $notifications);

		return new self(
			$sender_phone,
			$sender_card,
			$target_card,
			$invoice,
			$amount,
			$currency,
			$notification_cost,
			$notifications);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->sender_phone === $x->sender_phone

			&& $this->sender_card === $x->sender_card

			&& $this->target_card === $x->target_card

			&& $this->invoice === $x->invoice

			&& $this->amount === $x->amount

			&& $this->currency === $x->currency

			&& $this->notification_cost === $x->notification_cost

			&& \count($this->notifications) === \count($x->notifications)
			&& (static function ($arr1, $arr2) {
				foreach ($arr1 as $i => $v1) {
					if (!isset($arr2[$i])) {
						return false;
					}
					$v2 = $arr2[$i];
					$v_eq = $v1 === $v2;
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
