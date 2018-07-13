<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class ActionPaymentCreate implements \JsonSerializable {

	/** @var string */
	private $user_id;
	/** @var string */
	private $msisdn;
	/** @var string */
	private $guid;
	/** @var int */
	private $invoice;
	/** @var string */
	private $card_alias;
	/** @var ActionPmtInfo */
	private $pmt_info;
	/** @var string */
	private $pmt_desc;

	public function __construct(
		string $user_id,
		string $msisdn,
		string $guid,
		int $invoice,
		string $card_alias,
		ActionPmtInfo $pmt_info,
		?string $pmt_desc
	){
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
	 * @return string
	 */
	public function getPmtDesc() : ?string {
		return $this->pmt_desc;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['user_id'] = $this->user_id;

		$result['msisdn'] = $this->msisdn;

		$result['guid'] = $this->guid;

		$result['invoice'] = $this->invoice;

		$result['card_alias'] = $this->card_alias;

		$result['pmt_info'] = $this->pmt_info->jsonSerialize();

		$result['pmt_desc'] = $this->pmt_desc;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : ActionPaymentCreate {
		if(array_key_exists('user_id', $arr)){
			$user_id = $arr['user_id'];
		}else{
			throw new \InvalidArgumentException("Property 'user_id' not specified");
		}
		$user_id = $user_id !== null ? (string)$user_id : null;

		if(array_key_exists('msisdn', $arr)){
			$msisdn = $arr['msisdn'];
		}else{
			throw new \InvalidArgumentException("Property 'msisdn' not specified");
		}
		$msisdn = $msisdn !== null ? (string)$msisdn : null;

		if(array_key_exists('guid', $arr)){
			$guid = $arr['guid'];
		}else{
			throw new \InvalidArgumentException("Property 'guid' not specified");
		}
		$guid = $guid !== null ? (string)$guid : null;

		if(array_key_exists('invoice', $arr)){
			$invoice = $arr['invoice'];
		}else{
			throw new \InvalidArgumentException("Property 'invoice' not specified");
		}
		$invoice = $invoice !== null ? (int)$invoice : null;

		if(array_key_exists('card_alias', $arr)){
			$card_alias = $arr['card_alias'];
		}else{
			throw new \InvalidArgumentException("Property 'card_alias' not specified");
		}
		$card_alias = $card_alias !== null ? (string)$card_alias : null;

		if(array_key_exists('pmt_info', $arr)){
			$pmt_info = $arr['pmt_info'];
		}else{
			throw new \InvalidArgumentException("Property 'pmt_info' not specified");
		}
		try {
			$pmt_info = $pmt_info !== null ? ActionPmtInfo::deserialize($pmt_info) : null;
		}catch (\Exception $e){
			throw new \InvalidArgumentException('Deserialization error: '.$e->getMessage(), 0, $e);
		}

		if(array_key_exists('pmt_desc', $arr)){
			$pmt_desc = $arr['pmt_desc'];
		}else{
			throw new \InvalidArgumentException("Property 'pmt_desc' not specified");
		}
		$pmt_desc = $pmt_desc !== null ? (string)$pmt_desc : null;

		return new static($user_id, $msisdn, $guid, $invoice, $card_alias, $pmt_info, $pmt_desc);
	}

}
