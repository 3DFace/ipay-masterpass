<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class ActionPmtInfo implements \JsonSerializable {

	/** @var string */
	private $acc;
	/** @var int */
	private $invoice;

	public function __construct(?string $acc, ?int $invoice){
		$this->acc = $acc;
		$this->invoice = $invoice;
	}

	/**
	 * @return string
	 */
	public function getAcc() : ?string {
		return $this->acc;
	}

	/**
	 * @return int
	 */
	public function getInvoice() : ?int {
		return $this->invoice;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['acc'] = $this->acc;

		$result['invoice'] = $this->invoice;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : ActionPmtInfo {
		$acc = null;
		if(\array_key_exists('acc', $arr)){
			$acc = $arr['acc'];
		}
		$acc = $acc !== null ? (string)$acc : null;

		$invoice = null;
		if(\array_key_exists('invoice', $arr)){
			$invoice = $arr['invoice'];
		}
		$invoice = $invoice !== null ? (int)$invoice : null;

		return new static($acc, $invoice);
	}

}
