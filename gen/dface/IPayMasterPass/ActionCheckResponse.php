<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class ActionCheckResponse implements \JsonSerializable {

	/** @var string */
	private $user_status;

	public function __construct(string $user_status){
		$this->user_status = $user_status;
	}

	/**
	 * @return string
	 */
	public function getUserStatus() : string {
		return $this->user_status;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['user_status'] = $this->user_status;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : ActionCheckResponse {
		if(array_key_exists('user_status', $arr)){
			$user_status = $arr['user_status'];
		}else{
			throw new \InvalidArgumentException("Property 'user_status' not specified");
		}
		$user_status = $user_status !== null ? (string)$user_status : null;

		return new static($user_status);
	}

}
