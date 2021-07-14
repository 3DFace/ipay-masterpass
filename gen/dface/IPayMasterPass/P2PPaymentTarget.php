<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class P2PPaymentTarget implements JsonSerializable {

	private string $pan;
	private bool $_dirty = false;

	/**
	 * @param string $pan
	 */
	public function __construct(string $pan) {
		$this->pan = $pan;
	}

	/**
	 * @return string
	 */
	public function getPan() : string {
		return $this->pan;
	}

	/**
	 * @return array|\stdClass
	 */
	public function jsonSerialize() {

		$result = [];

		$result['pan'] = $this->pan;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize($data) : self {
		$arr = (array)$data;
		if (\array_key_exists('pan', $arr)) {
			$pan = $arr['pan'];
		} else {
			throw new \InvalidArgumentException("Property 'pan' not specified");
		}
		$pan = $pan === null ? null : (string)$pan;

		return new self($pan);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->pan === $x->pan;
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
