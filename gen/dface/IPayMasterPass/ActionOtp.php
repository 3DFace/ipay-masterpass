<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class ActionOtp implements \JsonSerializable {

	/** @var string */
	private $user_id;
	/** @var string */
	private $msisdn;
	/** @var string */
	private $token;
	/** @var string */
	private $value;

	public function __construct(
		string $user_id,
		string $msisdn,
		string $token,
		string $value
	){
		$this->user_id = $user_id;
		$this->msisdn = $msisdn;
		$this->token = $token;
		$this->value = $value;
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
	public function getToken() : string {
		return $this->token;
	}

	/**
	 * @return string
	 */
	public function getValue() : string {
		return $this->value;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['user_id'] = $this->user_id;

		$result['msisdn'] = $this->msisdn;

		$result['token'] = $this->token;

		$result['value'] = $this->value;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : ActionOtp {
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

		if(\array_key_exists('token', $arr)){
			$token = $arr['token'];
		}else{
			throw new \InvalidArgumentException("Property 'token' not specified");
		}
		$token = $token !== null ? (string)$token : null;

		if(\array_key_exists('value', $arr)){
			$value = $arr['value'];
		}else{
			throw new \InvalidArgumentException("Property 'value' not specified");
		}
		$value = $value !== null ? (string)$value : null;

		return new static($user_id, $msisdn, $token, $value);
	}

}
