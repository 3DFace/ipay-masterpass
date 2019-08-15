<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class ActionOtpResponse implements \JsonSerializable {

	/** @var string */
	private $status;

	public function __construct(string $status){
		$this->status = $status;
	}

	/**
	 * @return string
	 */
	public function getStatus() : string {
		return $this->status;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['status'] = $this->status;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : ActionOtpResponse {
		if(\array_key_exists('status', $arr)){
			$status = $arr['status'];
		}else{
			throw new \InvalidArgumentException("Property 'status' not specified");
		}
		$status = $status !== null ? (string)$status : null;

		return new static($status);
	}

}
