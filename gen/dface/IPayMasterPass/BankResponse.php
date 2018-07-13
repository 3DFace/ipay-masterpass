<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class BankResponse implements \JsonSerializable {

	/** @var string */
	private $bank_id;
	/** @var string */
	private $rc;
	/** @var string */
	private $action;

	public function __construct(?string $bank_id, ?string $rc, ?string $action){
		$this->bank_id = $bank_id;
		$this->rc = $rc;
		$this->action = $action;
	}

	/**
	 * @return string
	 */
	public function getBankId() : ?string {
		return $this->bank_id;
	}

	/**
	 * @return string
	 */
	public function getRc() : ?string {
		return $this->rc;
	}

	/**
	 * @return string
	 */
	public function getAction() : ?string {
		return $this->action;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['bank_id'] = $this->bank_id;

		$result['rc'] = $this->rc;

		$result['action'] = $this->action;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : BankResponse {
		$bank_id = null;
		if(array_key_exists('bank_id', $arr)){
			$bank_id = $arr['bank_id'];
		}
		$bank_id = $bank_id !== null ? (string)$bank_id : null;

		$rc = null;
		if(array_key_exists('rc', $arr)){
			$rc = $arr['rc'];
		}
		$rc = $rc !== null ? (string)$rc : null;

		$action = null;
		if(array_key_exists('action', $arr)){
			$action = $arr['action'];
		}
		$action = $action !== null ? (string)$action : null;

		return new static($bank_id, $rc, $action);
	}

}
