<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class P2PPaymentNotification implements \JsonSerializable {

	/** @var string */
	private $kind;
	/** @var string */
	private $adres;
	/** @var string */
	private $text;

	public function __construct(string $kind, string $adres, string $text){
		$this->kind = $kind;
		$this->adres = $adres;
		$this->text = $text;
	}

	/**
	 * @return string
	 */
	public function getKind() : string {
		return $this->kind;
	}

	/**
	 * @return string
	 */
	public function getAdres() : string {
		return $this->adres;
	}

	/**
	 * @return string
	 */
	public function getText() : string {
		return $this->text;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['kind'] = $this->kind;

		$result['adres'] = $this->adres;

		$result['text'] = $this->text;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : P2PPaymentNotification {
		if(array_key_exists('kind', $arr)){
			$kind = $arr['kind'];
		}else{
			throw new \InvalidArgumentException("Property 'kind' not specified");
		}
		$kind = $kind !== null ? (string)$kind : null;

		if(array_key_exists('adres', $arr)){
			$adres = $arr['adres'];
		}else{
			throw new \InvalidArgumentException("Property 'adres' not specified");
		}
		$adres = $adres !== null ? (string)$adres : null;

		if(array_key_exists('text', $arr)){
			$text = $arr['text'];
		}else{
			throw new \InvalidArgumentException("Property 'text' not specified");
		}
		$text = $text !== null ? (string)$text : null;

		return new static($kind, $adres, $text);
	}

}
