<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class P2PPaymentFunds implements \JsonSerializable {

	/** @var int */
	private $invoice;
	/** @var string */
	private $currency;

	public function __construct(int $invoice, string $currency){
		$this->invoice = $invoice;
		$this->currency = $currency;
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
	public function getCurrency() : string {
		return $this->currency;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['invoice'] = $this->invoice;

		$result['currency'] = $this->currency;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : P2PPaymentFunds {
		if(array_key_exists('invoice', $arr)){
			$invoice = $arr['invoice'];
		}else{
			throw new \InvalidArgumentException("Property 'invoice' not specified");
		}
		$invoice = $invoice !== null ? (int)$invoice : null;

		if(array_key_exists('currency', $arr)){
			$currency = $arr['currency'];
		}else{
			throw new \InvalidArgumentException("Property 'currency' not specified");
		}
		$currency = $currency !== null ? (string)$currency : null;

		return new static($invoice, $currency);
	}

}
