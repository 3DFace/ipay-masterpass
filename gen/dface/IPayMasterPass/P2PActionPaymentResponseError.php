<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class P2PActionPaymentResponseError implements \JsonSerializable {

	/** @var string */
	private $err_group;
	/** @var string */
	private $err_reason;

	public function __construct(string $err_group, string $err_reason){
		$this->err_group = $err_group;
		$this->err_reason = $err_reason;
	}

	/**
	 * @return string
	 */
	public function getErrGroup() : string {
		return $this->err_group;
	}

	/**
	 * @return string
	 */
	public function getErrReason() : string {
		return $this->err_reason;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['err_group'] = $this->err_group;

		$result['err_reason'] = $this->err_reason;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : P2PActionPaymentResponseError {
		if(\array_key_exists('err_group', $arr)){
			$err_group = $arr['err_group'];
		}else{
			throw new \InvalidArgumentException("Property 'err_group' not specified");
		}
		$err_group = $err_group !== null ? (string)$err_group : null;

		if(\array_key_exists('err_reason', $arr)){
			$err_reason = $arr['err_reason'];
		}else{
			throw new \InvalidArgumentException("Property 'err_reason' not specified");
		}
		$err_reason = $err_reason !== null ? (string)$err_reason : null;

		return new static($err_group, $err_reason);
	}

}
