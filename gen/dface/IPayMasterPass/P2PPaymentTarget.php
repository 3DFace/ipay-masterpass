<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class P2PPaymentTarget implements \JsonSerializable {

	/** @var string */
	private $pan;

	public function __construct(string $pan){
		$this->pan = $pan;
	}

	/**
	 * @return string
	 */
	public function getPan() : string {
		return $this->pan;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['pan'] = $this->pan;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : P2PPaymentTarget {
		if(\array_key_exists('pan', $arr)){
			$pan = $arr['pan'];
		}else{
			throw new \InvalidArgumentException("Property 'pan' not specified");
		}
		$pan = $pan !== null ? (string)$pan : null;

		return new static($pan);
	}

}
