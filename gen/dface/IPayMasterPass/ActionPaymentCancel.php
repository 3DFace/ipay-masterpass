<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class ActionPaymentCancel implements \JsonSerializable {

	/** @var string */
	private $user_id;
	/** @var string */
	private $msisdn;
	/** @var int */
	private $pmt_id;
	/** @var int */
	private $invoice;
	/** @var string */
	private $guid;

	public function __construct(
		string $user_id,
		string $msisdn,
		int $pmt_id,
		int $invoice,
		string $guid
	){
		$this->user_id = $user_id;
		$this->msisdn = $msisdn;
		$this->pmt_id = $pmt_id;
		$this->invoice = $invoice;
		$this->guid = $guid;
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
	 * @return string
	 */
	public function getGuid() : string {
		return $this->guid;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['user_id'] = $this->user_id;

		$result['msisdn'] = $this->msisdn;

		$result['pmt_id'] = $this->pmt_id;

		$result['invoice'] = $this->invoice;

		$result['guid'] = $this->guid;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : ActionPaymentCancel {
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

		if(\array_key_exists('pmt_id', $arr)){
			$pmt_id = $arr['pmt_id'];
		}else{
			throw new \InvalidArgumentException("Property 'pmt_id' not specified");
		}
		$pmt_id = $pmt_id !== null ? (int)$pmt_id : null;

		if(\array_key_exists('invoice', $arr)){
			$invoice = $arr['invoice'];
		}else{
			throw new \InvalidArgumentException("Property 'invoice' not specified");
		}
		$invoice = $invoice !== null ? (int)$invoice : null;

		if(\array_key_exists('guid', $arr)){
			$guid = $arr['guid'];
		}else{
			throw new \InvalidArgumentException("Property 'guid' not specified");
		}
		$guid = $guid !== null ? (string)$guid : null;

		return new static($user_id, $msisdn, $pmt_id, $invoice, $guid);
	}

}
