<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class CardInfo implements JsonSerializable {

	private string $card_alias;
	private string $mask;
	private string $uid;
	private bool $is_expired;
	private bool $is_corporate;
	private ?string $ref_no;
	private bool $_dirty = false;

	/**
	 * @param string $card_alias
	 * @param string $mask
	 * @param string $uid
	 * @param bool $is_expired
	 * @param bool $is_corporate
	 * @param string|null $ref_no
	 */
	public function __construct(
		string $card_alias,
		string $mask,
		string $uid,
		bool $is_expired = false,
		bool $is_corporate = false,
		?string $ref_no = null
	) {
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
	 * @return string|null
	 */
	public function getRefNo() : ?string {
		return $this->ref_no;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['card_alias'] = $this->card_alias;

		$result['mask'] = $this->mask;

		$result['uid'] = $this->uid;

		$result['is_expired'] = $this->is_expired;

		$result['is_corporate'] = $this->is_corporate;

		$result['ref_no'] = $this->ref_no;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		if (\array_key_exists('card_alias', $arr)) {
			$card_alias = $arr['card_alias'];
		} else {
			throw new \InvalidArgumentException("Property 'card_alias' not specified");
		}
		$card_alias = $card_alias === null ? null : (string)$card_alias;

		if (\array_key_exists('mask', $arr)) {
			$mask = $arr['mask'];
		} else {
			throw new \InvalidArgumentException("Property 'mask' not specified");
		}
		$mask = $mask === null ? null : (string)$mask;

		if (\array_key_exists('uid', $arr)) {
			$uid = $arr['uid'];
		} else {
			throw new \InvalidArgumentException("Property 'uid' not specified");
		}
		$uid = $uid === null ? null : (string)$uid;

		$is_expired = false;
		if (\array_key_exists('is_expired', $arr)) {
			$is_expired = $arr['is_expired'];
		}
		$is_expired = $is_expired === null ? null : (bool)$is_expired;

		$is_corporate = false;
		if (\array_key_exists('is_corporate', $arr)) {
			$is_corporate = $arr['is_corporate'];
		}
		$is_corporate = $is_corporate === null ? null : (bool)$is_corporate;

		$ref_no = null;
		if (\array_key_exists('ref_no', $arr)) {
			$ref_no = $arr['ref_no'];
		} elseif (\array_key_exists('RefNo', $arr)) {
			$ref_no = $arr['RefNo'];
		}
		$ref_no = $ref_no === null ? null : (string)$ref_no;

		return new self(
			$card_alias,
			$mask,
			$uid,
			$is_expired,
			$is_corporate,
			$ref_no);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->card_alias === $x->card_alias

			&& $this->mask === $x->mask

			&& $this->uid === $x->uid

			&& $this->is_expired === $x->is_expired

			&& $this->is_corporate === $x->is_corporate

			&& $this->ref_no === $x->ref_no;
	}

	public function isDirty() : bool {
		return $this->_dirty;
	}

	/**
	 * @return self
	 */
	public function washed() : self {
		if (!$this->_dirty) {
			return $this;
		}
		$x = clone $this;
		$x->_dirty = false;
		return $x;
	}

}
