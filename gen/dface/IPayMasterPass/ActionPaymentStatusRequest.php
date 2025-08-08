<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class ActionPaymentStatusRequest implements JsonSerializable {

	private string $user_id;
	private string $msisdn;
	private string $guid;
	private bool $_dirty = false;

	/**
	 * @param string $user_id
	 * @param string $msisdn
	 * @param string $guid
	 */
	public function __construct(string $user_id, string $msisdn, string $guid) {
		$this->user_id = $user_id;
		$this->msisdn = $msisdn;
		$this->guid = $guid;
	}

	/**
	 * @return string
	 */
	public function getUserId() : string {
		return $this->user_id;
	}

	/**
	 * @return string
	 */
	public function getMsisdn() : string {
		return $this->msisdn;
	}

	/**
	 * @return string
	 */
	public function getGuid() : string {
		return $this->guid;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['user_id'] = $this->user_id;

		$result['msisdn'] = $this->msisdn;

		$result['guid'] = $this->guid;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		if (\array_key_exists('user_id', $arr)) {
			$user_id = $arr['user_id'];
		} else {
			throw new \InvalidArgumentException("Property 'user_id' not specified");
		}
		$user_id = $user_id === null ? null : (string)$user_id;

		if (\array_key_exists('msisdn', $arr)) {
			$msisdn = $arr['msisdn'];
		} else {
			throw new \InvalidArgumentException("Property 'msisdn' not specified");
		}
		$msisdn = $msisdn === null ? null : (string)$msisdn;

		if (\array_key_exists('guid', $arr)) {
			$guid = $arr['guid'];
		} else {
			throw new \InvalidArgumentException("Property 'guid' not specified");
		}
		$guid = $guid === null ? null : (string)$guid;

		return new self($user_id, $msisdn, $guid);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->user_id === $x->user_id

			&& $this->msisdn === $x->msisdn

			&& $this->guid === $x->guid;
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
