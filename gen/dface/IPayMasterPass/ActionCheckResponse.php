<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class ActionCheckResponse implements JsonSerializable {

	private string $user_status;
	private bool $_dirty = false;

	/**
	 * @param string $user_status
	 */
	public function __construct(string $user_status) {
		$this->user_status = $user_status;
	}

	/**
	 * @return string
	 */
	public function getUserStatus() : string {
		return $this->user_status;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['user_status'] = $this->user_status;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		if (\array_key_exists('user_status', $arr)) {
			$user_status = $arr['user_status'];
		} else {
			throw new \InvalidArgumentException("Property 'user_status' not specified");
		}
		$user_status = $user_status === null ? null : (string)$user_status;

		return new self($user_status);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->user_status === $x->user_status;
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
