<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class ActionInviteResponse implements \JsonSerializable {

	/** @var string */
	private $verify;
	/** @var string */
	private $token;

	public function __construct(string $verify, string $token){
		$this->verify = $verify;
		$this->token = $token;
	}

	/**
	 * @return string
	 */
	public function getVerify() : string {
		return $this->verify;
	}

	/**
	 * @return string
	 */
	public function getToken() : string {
		return $this->token;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['verify'] = $this->verify;

		$result['token'] = $this->token;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : ActionInviteResponse {
		if(array_key_exists('verify', $arr)){
			$verify = $arr['verify'];
		}else{
			throw new \InvalidArgumentException("Property 'verify' not specified");
		}
		$verify = $verify !== null ? (string)$verify : null;

		if(array_key_exists('token', $arr)){
			$token = $arr['token'];
		}else{
			throw new \InvalidArgumentException("Property 'token' not specified");
		}
		$token = $token !== null ? (string)$token : null;

		return new static($verify, $token);
	}

}
