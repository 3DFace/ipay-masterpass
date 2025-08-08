<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class ActionPaymentResponse implements JsonSerializable {

	private string $msisdn;
	private int $pmt_id;
	private int $invoice;
	private int $amount;
	private int $pmt_status;
	private ActionPmtInfo $pmt_info;
	private string $card_alias;
	private string $card_mask;
	private BankResponse $bank_response;
	private ?string $secure;
	private ?string $token;
	private ?string $ascUrl;
	private ?string $pareq;
	private ?string $md;
	private bool $_dirty = false;

	/**
	 * @param string $msisdn
	 * @param int $pmt_id
	 * @param int $invoice
	 * @param int $amount
	 * @param int $pmt_status
	 * @param ActionPmtInfo $pmt_info
	 * @param string $card_alias
	 * @param string $card_mask
	 * @param BankResponse $bank_response
	 * @param string|null $secure
	 * @param string|null $token
	 * @param string|null $ascUrl
	 * @param string|null $pareq
	 * @param string|null $md
	 */
	public function __construct(
		string $msisdn,
		int $pmt_id,
		int $invoice,
		int $amount,
		int $pmt_status,
		ActionPmtInfo $pmt_info,
		string $card_alias,
		string $card_mask,
		BankResponse $bank_response,
		?string $secure = null,
		?string $token = null,
		?string $ascUrl = null,
		?string $pareq = null,
		?string $md = null
	) {
		$this->msisdn = $msisdn;
		$this->pmt_id = $pmt_id;
		$this->invoice = $invoice;
		$this->amount = $amount;
		$this->pmt_status = $pmt_status;
		$this->pmt_info = $pmt_info;
		$this->card_alias = $card_alias;
		$this->card_mask = $card_mask;
		$this->bank_response = $bank_response;
		$this->secure = $secure;
		$this->token = $token;
		$this->ascUrl = $ascUrl;
		$this->pareq = $pareq;
		$this->md = $md;
	}

	/**
	 * @return string
	 */
	public function getMsisdn() : string {
		return $this->msisdn;
	}

	/**
	 * @return int
	 */
	public function getPmtId() : int {
		return $this->pmt_id;
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
	 * @return int
	 */
	public function getPmtStatus() : int {
		return $this->pmt_status;
	}

	/**
	 * @return ActionPmtInfo
	 */
	public function getPmtInfo() : ActionPmtInfo {
		return $this->pmt_info;
	}

	/**
	 * @return string
	 */
	public function getCardAlias() : string {
		return $this->card_alias;
	}

	/**
	 * @return string
	 */
	public function getCardMask() : string {
		return $this->card_mask;
	}

	/**
	 * @return BankResponse
	 */
	public function getBankResponse() : BankResponse {
		return $this->bank_response;
	}

	/**
	 * @return string|null
	 */
	public function getSecure() : ?string {
		return $this->secure;
	}

	/**
	 * @return string|null
	 */
	public function getToken() : ?string {
		return $this->token;
	}

	/**
	 * @return string|null
	 */
	public function getAscUrl() : ?string {
		return $this->ascUrl;
	}

	/**
	 * @return string|null
	 */
	public function getPareq() : ?string {
		return $this->pareq;
	}

	/**
	 * @return string|null
	 */
	public function getMd() : ?string {
		return $this->md;
	}

	/**
	 * @param int $val
	 * @return self
	 */
	public function withPmtStatus(int $val) : self {
		if ($this->pmt_status === $val) {
			return $this;
		}
		$clone = clone $this;
		$clone->pmt_status = $val;
		$clone->_dirty = true;
		return $clone;
	}

	/**
	 * @param BankResponse $val
	 * @return self
	 */
	public function withBankResponse(BankResponse $val) : self {
		if ($this->bank_response === $val) {
			return $this;
		}
		$clone = clone $this;
		$clone->bank_response = $val;
		$clone->_dirty = true;
		return $clone;
	}

	/**
	 * @param string|null $val
	 * @return self
	 */
	public function withSecure(?string $val) : self {
		if ($this->secure === $val) {
			return $this;
		}
		$clone = clone $this;
		$clone->secure = $val;
		$clone->_dirty = true;
		return $clone;
	}

	/**
	 * @param string|null $val
	 * @return self
	 */
	public function withToken(?string $val) : self {
		if ($this->token === $val) {
			return $this;
		}
		$clone = clone $this;
		$clone->token = $val;
		$clone->_dirty = true;
		return $clone;
	}

	/**
	 * @param string|null $val
	 * @return self
	 */
	public function withAscUrl(?string $val) : self {
		if ($this->ascUrl === $val) {
			return $this;
		}
		$clone = clone $this;
		$clone->ascUrl = $val;
		$clone->_dirty = true;
		return $clone;
	}

	/**
	 * @param string|null $val
	 * @return self
	 */
	public function withPareq(?string $val) : self {
		if ($this->pareq === $val) {
			return $this;
		}
		$clone = clone $this;
		$clone->pareq = $val;
		$clone->_dirty = true;
		return $clone;
	}

	/**
	 * @param string|null $val
	 * @return self
	 */
	public function withMd(?string $val) : self {
		if ($this->md === $val) {
			return $this;
		}
		$clone = clone $this;
		$clone->md = $val;
		$clone->_dirty = true;
		return $clone;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['msisdn'] = $this->msisdn;

		$result['pmt_id'] = $this->pmt_id;

		$result['invoice'] = $this->invoice;

		$result['amount'] = $this->amount;

		$result['pmt_status'] = $this->pmt_status;

		$result['pmt_info'] = $this->pmt_info->jsonSerialize();

		$result['card_alias'] = $this->card_alias;

		$result['card_mask'] = $this->card_mask;

		$result['bank_response'] = $this->bank_response->jsonSerialize();

		$result['secure'] = $this->secure;

		$result['token'] = $this->token;

		$result['ascUrl'] = $this->ascUrl;

		$result['pareq'] = $this->pareq;

		$result['md'] = $this->md;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		if (\array_key_exists('msisdn', $arr)) {
			$msisdn = $arr['msisdn'];
		} else {
			throw new \InvalidArgumentException("Property 'msisdn' not specified");
		}
		$msisdn = $msisdn === null ? null : (string)$msisdn;

		if (\array_key_exists('pmt_id', $arr)) {
			$pmt_id = $arr['pmt_id'];
		} else {
			throw new \InvalidArgumentException("Property 'pmt_id' not specified");
		}
		$pmt_id = $pmt_id === null ? null : (int)$pmt_id;

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

		if (\array_key_exists('pmt_status', $arr)) {
			$pmt_status = $arr['pmt_status'];
		} else {
			throw new \InvalidArgumentException("Property 'pmt_status' not specified");
		}
		$pmt_status = $pmt_status === null ? null : (int)$pmt_status;

		$pmt_info = [];
		if (\array_key_exists('pmt_info', $arr)) {
			$pmt_info = $arr['pmt_info'];
		}
		$pmt_info = $pmt_info === null ? null : ActionPmtInfo::deserialize($pmt_info);

		if (\array_key_exists('card_alias', $arr)) {
			$card_alias = $arr['card_alias'];
		} else {
			throw new \InvalidArgumentException("Property 'card_alias' not specified");
		}
		$card_alias = $card_alias === null ? null : (string)$card_alias;

		if (\array_key_exists('card_mask', $arr)) {
			$card_mask = $arr['card_mask'];
		} else {
			throw new \InvalidArgumentException("Property 'card_mask' not specified");
		}
		$card_mask = $card_mask === null ? null : (string)$card_mask;

		if (\array_key_exists('bank_response', $arr)) {
			$bank_response = $arr['bank_response'];
		} else {
			throw new \InvalidArgumentException("Property 'bank_response' not specified");
		}
		$bank_response = $bank_response === null ? null : BankResponse::deserialize($bank_response);

		$secure = $arr['secure'] ?? null;
		$secure = $secure === null ? null : (string)$secure;

		$token = $arr['token'] ?? null;
		$token = $token === null ? null : (string)$token;

		$ascUrl = $arr['ascUrl'] ?? null;
		$ascUrl = $ascUrl === null ? null : (string)$ascUrl;

		$pareq = $arr['pareq'] ?? null;
		$pareq = $pareq === null ? null : (string)$pareq;

		$md = $arr['md'] ?? null;
		$md = $md === null ? null : (string)$md;

		return new self(
			$msisdn,
			$pmt_id,
			$invoice,
			$amount,
			$pmt_status,
			$pmt_info,
			$card_alias,
			$card_mask,
			$bank_response,
			$secure,
			$token,
			$ascUrl,
			$pareq,
			$md);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->msisdn === $x->msisdn

			&& $this->pmt_id === $x->pmt_id

			&& $this->invoice === $x->invoice

			&& $this->amount === $x->amount

			&& $this->pmt_status === $x->pmt_status

			&& $this->pmt_info->equals($x->pmt_info)

			&& $this->card_alias === $x->card_alias

			&& $this->card_mask === $x->card_mask

			&& $this->bank_response->equals($x->bank_response)

			&& $this->secure === $x->secure

			&& $this->token === $x->token

			&& $this->ascUrl === $x->ascUrl

			&& $this->pareq === $x->pareq

			&& $this->md === $x->md;
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
