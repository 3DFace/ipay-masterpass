<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class ActionInviteResponse implements JsonSerializable {

	private string $verify;
	private string $token;
	private bool $_dirty = false;

	/**
	 * @param string $verify
	 * @param string $token
	 */
	public function __construct(string $verify, string $token) {
		$this->verify = $verify;
		$this->token = $token;
	}

	/**
	 * @return string
	 */
	public function getVerify() : string {
		return $this->verify;
	}

	/**
	 * @return string
	 */
	public function getToken() : string {
		return $this->token;
	}

	/**
	 * @return array|\stdClass
	 */
	public function jsonSerialize() {

		$result = [];

		$result['verify'] = $this->verify;

		$result['token'] = $this->token;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize($data) : self {
		$arr = (array)$data;
		if (\array_key_exists('verify', $arr)) {
			$verify = $arr['verify'];
		} else {
			throw new \InvalidArgumentException("Property 'verify' not specified");
		}
		$verify = $verify === null ? null : (string)$verify;

		if (\array_key_exists('token', $arr)) {
			$token = $arr['token'];
		} else {
			throw new \InvalidArgumentException("Property 'token' not specified");
		}
		$token = $token === null ? null : (string)$token;

		return new self($verify, $token);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->verify === $x->verify

			&& $this->token === $x->token;
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
