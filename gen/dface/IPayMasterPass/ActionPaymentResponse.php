<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class ActionPaymentResponse implements \JsonSerializable {

	/** @var string */
	private $msisdn;
	/** @var int */
	private $pmt_id;
	/** @var int */
	private $invoice;
	/** @var int */
	private $amount;
	/** @var int */
	private $pmt_status;
	/** @var ActionPmtInfo */
	private $pmt_info;
	/** @var string */
	private $card_alias;
	/** @var string */
	private $card_mask;
	/** @var BankResponse */
	private $bank_response;
	/** @var string */
	private $secure;
	/** @var string */
	private $token;
	/** @var string */
	private $ascUrl;
	/** @var string */
	private $pareq;
	/** @var string */
	private $md;

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
		$secure = null,
		$token = null,
		$ascUrl = null,
		$pareq = null,
		$md = null
	){
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
	 * @return string
	 */
	public function getSecure() : ?string {
		return $this->secure;
	}

	/**
	 * @return string
	 */
	public function getToken() : ?string {
		return $this->token;
	}

	/**
	 * @return string
	 */
	public function getAscUrl() : ?string {
		return $this->ascUrl;
	}

	/**
	 * @return string
	 */
	public function getPareq() : ?string {
		return $this->pareq;
	}

	/**
	 * @return string
	 */
	public function getMd() : ?string {
		return $this->md;
	}

	/**
	 * @param int $val
	 * @return self
	 */
	public function withPmtStatus(int $val) : self {
		$clone = clone $this;
		$clone->pmt_status = $val;
		return $clone;
	}

	/**
	 * @param BankResponse $val
	 * @return self
	 */
	public function withBankResponse(BankResponse $val) : self {
		$clone = clone $this;
		$clone->bank_response = $val;
		return $clone;
	}

	/**
	 * @param string $val
	 * @return self
	 */
	public function withSecure(?string $val) : self {
		$clone = clone $this;
		$clone->secure = $val;
		return $clone;
	}

	/**
	 * @param string $val
	 * @return self
	 */
	public function withToken(?string $val) : self {
		$clone = clone $this;
		$clone->token = $val;
		return $clone;
	}

	/**
	 * @param string $val
	 * @return self
	 */
	public function withAscUrl(?string $val) : self {
		$clone = clone $this;
		$clone->ascUrl = $val;
		return $clone;
	}

	/**
	 * @param string $val
	 * @return self
	 */
	public function withPareq(?string $val) : self {
		$clone = clone $this;
		$clone->pareq = $val;
		return $clone;
	}

	/**
	 * @param string $val
	 * @return self
	 */
	public function withMd(?string $val) : self {
		$clone = clone $this;
		$clone->md = $val;
		return $clone;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

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

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : ActionPaymentResponse {
		if(array_key_exists('msisdn', $arr)){
			$msisdn = $arr['msisdn'];
		}else{
			throw new \InvalidArgumentException("Property 'msisdn' not specified");
		}
		$msisdn = $msisdn !== null ? (string)$msisdn : null;

		if(array_key_exists('pmt_id', $arr)){
			$pmt_id = $arr['pmt_id'];
		}else{
			throw new \InvalidArgumentException("Property 'pmt_id' not specified");
		}
		$pmt_id = $pmt_id !== null ? (int)$pmt_id : null;

		if(array_key_exists('invoice', $arr)){
			$invoice = $arr['invoice'];
		}else{
			throw new \InvalidArgumentException("Property 'invoice' not specified");
		}
		$invoice = $invoice !== null ? (int)$invoice : null;

		if(array_key_exists('amount', $arr)){
			$amount = $arr['amount'];
		}else{
			throw new \InvalidArgumentException("Property 'amount' not specified");
		}
		$amount = $amount !== null ? (int)$amount : null;

		if(array_key_exists('pmt_status', $arr)){
			$pmt_status = $arr['pmt_status'];
		}else{
			throw new \InvalidArgumentException("Property 'pmt_status' not specified");
		}
		$pmt_status = $pmt_status !== null ? (int)$pmt_status : null;

		$pmt_info = [];
		if(array_key_exists('pmt_info', $arr)){
			$pmt_info = $arr['pmt_info'];
		}
		try {
			$pmt_info = $pmt_info !== null ? ActionPmtInfo::deserialize($pmt_info) : null;
		}catch (\Exception $e){
			throw new \InvalidArgumentException('Deserialization error: '.$e->getMessage(), 0, $e);
		}

		if(array_key_exists('card_alias', $arr)){
			$card_alias = $arr['card_alias'];
		}else{
			throw new \InvalidArgumentException("Property 'card_alias' not specified");
		}
		$card_alias = $card_alias !== null ? (string)$card_alias : null;

		if(array_key_exists('card_mask', $arr)){
			$card_mask = $arr['card_mask'];
		}else{
			throw new \InvalidArgumentException("Property 'card_mask' not specified");
		}
		$card_mask = $card_mask !== null ? (string)$card_mask : null;

		if(array_key_exists('bank_response', $arr)){
			$bank_response = $arr['bank_response'];
		}else{
			throw new \InvalidArgumentException("Property 'bank_response' not specified");
		}
		try {
			$bank_response = $bank_response !== null ? BankResponse::deserialize($bank_response) : null;
		}catch (\Exception $e){
			throw new \InvalidArgumentException('Deserialization error: '.$e->getMessage(), 0, $e);
		}

		$secure = null;
		if(array_key_exists('secure', $arr)){
			$secure = $arr['secure'];
		}
		$secure = $secure !== null ? (string)$secure : null;

		$token = null;
		if(array_key_exists('token', $arr)){
			$token = $arr['token'];
		}
		$token = $token !== null ? (string)$token : null;

		$ascUrl = null;
		if(array_key_exists('ascUrl', $arr)){
			$ascUrl = $arr['ascUrl'];
		}
		$ascUrl = $ascUrl !== null ? (string)$ascUrl : null;

		$pareq = null;
		if(array_key_exists('pareq', $arr)){
			$pareq = $arr['pareq'];
		}
		$pareq = $pareq !== null ? (string)$pareq : null;

		$md = null;
		if(array_key_exists('md', $arr)){
			$md = $arr['md'];
		}
		$md = $md !== null ? (string)$md : null;

		return new static($msisdn, $pmt_id, $invoice, $amount, $pmt_status, $pmt_info, $card_alias, $card_mask, $bank_response, $secure, $token, $ascUrl, $pareq, $md);
	}

}
