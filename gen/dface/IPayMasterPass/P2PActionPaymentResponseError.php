<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class P2PActionPaymentResponseError implements JsonSerializable {

	private string $err_group;
	private string $err_reason;
	private bool $_dirty = false;

	/**
	 * @param string $err_group
	 * @param string $err_reason
	 */
	public function __construct(string $err_group, string $err_reason) {
		$this->err_group = $err_group;
		$this->err_reason = $err_reason;
	}

	/**
	 * @return string
	 */
	public function getErrGroup() : string {
		return $this->err_group;
	}

	/**
	 * @return string
	 */
	public function getErrReason() : string {
		return $this->err_reason;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['err_group'] = $this->err_group;

		$result['err_reason'] = $this->err_reason;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		if (\array_key_exists('err_group', $arr)) {
			$err_group = $arr['err_group'];
		} else {
			throw new \InvalidArgumentException("Property 'err_group' not specified");
		}
		$err_group = $err_group === null ? null : (string)$err_group;

		if (\array_key_exists('err_reason', $arr)) {
			$err_reason = $arr['err_reason'];
		} else {
			throw new \InvalidArgumentException("Property 'err_reason' not specified");
		}
		$err_reason = $err_reason === null ? null : (string)$err_reason;

		return new self($err_group, $err_reason);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->err_group === $x->err_group

			&& $this->err_reason === $x->err_reason;
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
