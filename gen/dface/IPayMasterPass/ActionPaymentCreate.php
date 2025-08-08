<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class ActionPaymentCreate implements JsonSerializable {

	private string $user_id;
	private string $msisdn;
	private string $guid;
	private int $invoice;
	private string $card_alias;
	private ActionPmtInfo $pmt_info;
	private ?string $pmt_desc;
	private bool $_dirty = false;

	/**
	 * @param string $user_id
	 * @param string $msisdn
	 * @param string $guid
	 * @param int $invoice
	 * @param string $card_alias
	 * @param ActionPmtInfo $pmt_info
	 * @param string|null $pmt_desc
	 */
	public function __construct(
		string $user_id,
		string $msisdn,
		string $guid,
		int $invoice,
		string $card_alias,
		ActionPmtInfo $pmt_info,
		?string $pmt_desc
	) {
		$this->user_id = $user_id;
		$this->msisdn = $msisdn;
		$this->guid = $guid;
		$this->invoice = $invoice;
		$this->card_alias = $card_alias;
		$this->pmt_info = $pmt_info;
		$this->pmt_desc = $pmt_desc;
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
	 * @return string
	 */
	public function getGuid() : string {
		return $this->guid;
	}

	/**
	 * @return int
	 */
	public function getInvoice() : int {
		return $this->invoice;
	}

	/**
	 * @return string
	 */
	public function getCardAlias() : string {
		return $this->card_alias;
	}

	/**
	 * @return ActionPmtInfo
	 */
	public function getPmtInfo() : ActionPmtInfo {
		return $this->pmt_info;
	}

	/**
	 * @return string|null
	 */
	public function getPmtDesc() : ?string {
		return $this->pmt_desc;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['user_id'] = $this->user_id;

		$result['msisdn'] = $this->msisdn;

		$result['guid'] = $this->guid;

		$result['invoice'] = $this->invoice;

		$result['card_alias'] = $this->card_alias;

		$result['pmt_info'] = $this->pmt_info->jsonSerialize();

		$result['pmt_desc'] = $this->pmt_desc;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
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

		if (\array_key_exists('guid', $arr)) {
			$guid = $arr['guid'];
		} else {
			throw new \InvalidArgumentException("Property 'guid' not specified");
		}
		$guid = $guid === null ? null : (string)$guid;

		if (\array_key_exists('invoice', $arr)) {
			$invoice = $arr['invoice'];
		} else {
			throw new \InvalidArgumentException("Property 'invoice' not specified");
		}
		$invoice = $invoice === null ? null : (int)$invoice;

		if (\array_key_exists('card_alias', $arr)) {
			$card_alias = $arr['card_alias'];
		} else {
			throw new \InvalidArgumentException("Property 'card_alias' not specified");
		}
		$card_alias = $card_alias === null ? null : (string)$card_alias;

		if (\array_key_exists('pmt_info', $arr)) {
			$pmt_info = $arr['pmt_info'];
		} else {
			throw new \InvalidArgumentException("Property 'pmt_info' not specified");
		}
		$pmt_info = $pmt_info === null ? null : ActionPmtInfo::deserialize($pmt_info);

		if (\array_key_exists('pmt_desc', $arr)) {
			$pmt_desc = $arr['pmt_desc'];
		} else {
			throw new \InvalidArgumentException("Property 'pmt_desc' not specified");
		}
		$pmt_desc = $pmt_desc === null ? null : (string)$pmt_desc;

		return new self(
			$user_id,
			$msisdn,
			$guid,
			$invoice,
			$card_alias,
			$pmt_info,
			$pmt_desc);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->user_id === $x->user_id

			&& $this->msisdn === $x->msisdn

			&& $this->guid === $x->guid

			&& $this->invoice === $x->invoice

			&& $this->card_alias === $x->card_alias

			&& $this->pmt_info->equals($x->pmt_info)

			&& $this->pmt_desc === $x->pmt_desc;
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
