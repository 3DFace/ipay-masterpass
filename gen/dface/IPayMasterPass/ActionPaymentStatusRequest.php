<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class ActionPaymentStatusRequest implements \JsonSerializable {

	/** @var string */
	private $user_id;
	/** @var string */
	private $msisdn;
	/** @var string */
	private $guid;

	public function __construct(string $user_id, string $msisdn, string $guid){
		$this->user_id = $user_id;
		$this->msisdn = $msisdn;
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

		$result['guid'] = $this->guid;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : ActionPaymentStatusRequest {
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

		return new static($user_id, $msisdn, $guid);
	}

}
