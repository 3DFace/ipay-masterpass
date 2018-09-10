<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class P2PPaymentSender implements \JsonSerializable {

	/** @var string */
	private $card_alias;

	public function __construct(string $card_alias){
		$this->card_alias = $card_alias;
	}

	/**
	 * @return string
	 */
	public function getCardAlias() : string {
		return $this->card_alias;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['card_alias'] = $this->card_alias;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : P2PPaymentSender {
		if(array_key_exists('card_alias', $arr)){
			$card_alias = $arr['card_alias'];
		}else{
			throw new \InvalidArgumentException("Property 'card_alias' not specified");
		}
		$card_alias = $card_alias !== null ? (string)$card_alias : null;

		return new static($card_alias);
	}

}
