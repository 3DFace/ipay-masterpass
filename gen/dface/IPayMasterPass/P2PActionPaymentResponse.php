<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use DateTimeImmutable;

class P2PActionPaymentResponse implements \JsonSerializable {

	/** @var int */
	private $status;
	/** @var string */
	private $pmt_id;
	/** @var string */
	private $mch_id;
	/** @var string */
	private $guid;
	/** @var DateTimeImmutable */
	private $init_date;
	/** @var DateTimeImmutable */
	private $pay_date;
	/** @var P2PActionPaymentResponseInfo */
	private $info;
	/** @var string */
	private $security_rate;
	/** @var mixed[] */
	private $security_data;
	/** @var P2PActionPaymentResponseError */
	private $error;
	/** @var string */
	private $ident;

	public function __construct(
		int $status,
		string $pmt_id,
		string $mch_id,
		string $guid,
		DateTimeImmutable $init_date,
		DateTimeImmutable $pay_date,
		P2PActionPaymentResponseInfo $info,
		$security_rate = null,
		?array $security_data = null,
		?P2PActionPaymentResponseError $error = null,
		$ident = null
	){
		$this->status = $status;
		$this->pmt_id = $pmt_id;
		$this->mch_id = $mch_id;
		$this->guid = $guid;
		$this->init_date = $init_date;
		$this->pay_date = $pay_date;
		$this->info = $info;
		$this->security_rate = $security_rate;
		$this->security_data = $security_data;
		$this->error = $error;
		$this->ident = $ident;
	}

	/**
	 * @return int
	 */
	public function getStatus() : int {
		return $this->status;
	}

	/**
	 * @return string
	 */
	public function getPmtId() : string {
		return $this->pmt_id;
	}

	/**
	 * @return string
	 */
	public function getMchId() : string {
		return $this->mch_id;
	}

	/**
	 * @return string
	 */
	public function getGuid() : string {
		return $this->guid;
	}

	/**
	 * @return DateTimeImmutable
	 */
	public function getInitDate() : DateTimeImmutable {
		return $this->init_date;
	}

	/**
	 * @return DateTimeImmutable
	 */
	public function getPayDate() : DateTimeImmutable {
		return $this->pay_date;
	}

	/**
	 * @return P2PActionPaymentResponseInfo
	 */
	public function getInfo() : P2PActionPaymentResponseInfo {
		return $this->info;
	}

	/**
	 * @return string
	 */
	public function getSecurityRate() : ?string {
		return $this->security_rate;
	}

	/**
	 * @return mixed[]
	 */
	public function getSecurityData() : ?array {
		return $this->security_data;
	}

	/**
	 * @return P2PActionPaymentResponseError
	 */
	public function getError() : ?P2PActionPaymentResponseError {
		return $this->error;
	}

	/**
	 * @return string
	 */
	public function getIdent() : ?string {
		return $this->ident;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['status'] = $this->status;

		$result['pmt_id'] = $this->pmt_id;

		$result['mch_id'] = $this->mch_id;

		$result['guid'] = $this->guid;

		$result['init_date'] = $this->init_date->format('Y-m-d H:i:s');

		$result['pay_date'] = $this->pay_date->format('Y-m-d H:i:s');

		$result['info'] = $this->info->jsonSerialize();

		$result['security_rate'] = $this->security_rate;

		$result['security_data'] = $this->security_data === null ? null : array_map(function ( $x){
			return $x;
		}, $this->security_data);

		$result['error'] = $this->error === null ? null : $this->error->jsonSerialize();

		$result['ident'] = $this->ident;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : P2PActionPaymentResponse {
		if(array_key_exists('status', $arr)){
			$status = $arr['status'];
		}else{
			throw new \InvalidArgumentException("Property 'status' not specified");
		}
		$status = $status !== null ? (int)$status : null;

		if(array_key_exists('pmt_id', $arr)){
			$pmt_id = $arr['pmt_id'];
		}else{
			throw new \InvalidArgumentException("Property 'pmt_id' not specified");
		}
		$pmt_id = $pmt_id !== null ? (string)$pmt_id : null;

		if(array_key_exists('mch_id', $arr)){
			$mch_id = $arr['mch_id'];
		}else{
			throw new \InvalidArgumentException("Property 'mch_id' not specified");
		}
		$mch_id = $mch_id !== null ? (string)$mch_id : null;

		if(array_key_exists('guid', $arr)){
			$guid = $arr['guid'];
		}else{
			throw new \InvalidArgumentException("Property 'guid' not specified");
		}
		$guid = $guid !== null ? (string)$guid : null;

		if(array_key_exists('init_date', $arr)){
			$init_date = $arr['init_date'];
		}else{
			throw new \InvalidArgumentException("Property 'init_date' not specified");
		}
		try {
			$init_date = $init_date !== null ? new DateTimeImmutable($init_date) : null;
		}catch (\Exception $e){
			throw new \InvalidArgumentException($e->getMessage(), 0, $e);
		}

		if(array_key_exists('pay_date', $arr)){
			$pay_date = $arr['pay_date'];
		}else{
			throw new \InvalidArgumentException("Property 'pay_date' not specified");
		}
		try {
			$pay_date = $pay_date !== null ? new DateTimeImmutable($pay_date) : null;
		}catch (\Exception $e){
			throw new \InvalidArgumentException($e->getMessage(), 0, $e);
		}

		if(array_key_exists('info', $arr)){
			$info = $arr['info'];
		}else{
			throw new \InvalidArgumentException("Property 'info' not specified");
		}
		try {
			$info = $info !== null ? P2PActionPaymentResponseInfo::deserialize($info) : null;
		}catch (\Exception $e){
			throw new \InvalidArgumentException('Deserialization error: '.$e->getMessage(), 0, $e);
		}

		$security_rate = null;
		if(array_key_exists('security_rate', $arr)){
			$security_rate = $arr['security_rate'];
		}
		$security_rate = $security_rate !== null ? (string)$security_rate : null;

		$security_data = null;
		if(array_key_exists('security_data', $arr)){
			$security_data = $arr['security_data'];
		}
		$security_data = $security_data !== null ? array_map(function ($x){
						return $x;
		}, $security_data) : null;

		$error = null;
		if(array_key_exists('error', $arr)){
			$error = $arr['error'];
		}
		try {
			$error = $error !== null ? P2PActionPaymentResponseError::deserialize($error) : null;
		}catch (\Exception $e){
			throw new \InvalidArgumentException('Deserialization error: '.$e->getMessage(), 0, $e);
		}

		$ident = null;
		if(array_key_exists('ident', $arr)){
			$ident = $arr['ident'];
		}
		$ident = $ident !== null ? (string)$ident : null;

		return new static($status, $pmt_id, $mch_id, $guid, $init_date, $pay_date, $info, $security_rate, $security_data, $error, $ident);
	}

}
