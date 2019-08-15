<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class CardInfo implements \JsonSerializable {

	/** @var string */
	private $card_alias;
	/** @var string */
	private $mask;
	/** @var string */
	private $uid;
	/** @var bool */
	private $is_expired;
	/** @var bool */
	private $is_corporate;
	/** @var string */
	private $ref_no;

	public function __construct(
		string $card_alias,
		string $mask,
		string $uid,
		$is_expired = false,
		$is_corporate = false,
		$ref_no = null
	){
		$this->card_alias = $card_alias;
		$this->mask = $mask;
		$this->uid = $uid;
		$this->is_expired = $is_expired;
		$this->is_corporate = $is_corporate;
		$this->ref_no = $ref_no;
	}

	/**
	 * @return string
	 */
	public function getCardAlias() : string {
		return $this->card_alias;
	}

	/**
	 * @return string
	 */
	public function getMask() : string {
		return $this->mask;
	}

	/**
	 * @return string
	 */
	public function getUid() : string {
		return $this->uid;
	}

	/**
	 * @return bool
	 */
	public function getIsExpired() : bool {
		return $this->is_expired;
	}

	/**
	 * @return bool
	 */
	public function getIsCorporate() : bool {
		return $this->is_corporate;
	}

	/**
	 * @return string
	 */
	public function getRefNo() : ?string {
		return $this->ref_no;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['card_alias'] = $this->card_alias;

		$result['mask'] = $this->mask;

		$result['uid'] = $this->uid;

		$result['is_expired'] = $this->is_expired;

		$result['is_corporate'] = $this->is_corporate;

		$result['ref_no'] = $this->ref_no;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : CardInfo {
		if(\array_key_exists('card_alias', $arr)){
			$card_alias = $arr['card_alias'];
		}else{
			throw new \InvalidArgumentException("Property 'card_alias' not specified");
		}
		$card_alias = $card_alias !== null ? (string)$card_alias : null;

		if(\array_key_exists('mask', $arr)){
			$mask = $arr['mask'];
		}else{
			throw new \InvalidArgumentException("Property 'mask' not specified");
		}
		$mask = $mask !== null ? (string)$mask : null;

		if(\array_key_exists('uid', $arr)){
			$uid = $arr['uid'];
		}else{
			throw new \InvalidArgumentException("Property 'uid' not specified");
		}
		$uid = $uid !== null ? (string)$uid : null;

		$is_expired = false;
		if(\array_key_exists('is_expired', $arr)){
			$is_expired = $arr['is_expired'];
		}
		$is_expired = $is_expired !== null ? (bool)$is_expired : null;

		$is_corporate = false;
		if(\array_key_exists('is_corporate', $arr)){
			$is_corporate = $arr['is_corporate'];
		}
		$is_corporate = $is_corporate !== null ? (bool)$is_corporate : null;

		$ref_no = null;
		if(\array_key_exists('ref_no', $arr)){
			$ref_no = $arr['ref_no'];
		}elseif(\array_key_exists('RefNo', $arr)){
			$ref_no = $arr['RefNo'];
		}
		$ref_no = $ref_no !== null ? (string)$ref_no : null;

		return new static($card_alias, $mask, $uid, $is_expired, $is_corporate, $ref_no);
	}

}
