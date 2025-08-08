<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class BankResponse implements JsonSerializable {

	private ?string $bank_id;
	private ?string $rc;
	private ?string $action;
	private bool $_dirty = false;

	/**
	 * @param string|null $bank_id
	 * @param string|null $rc
	 * @param string|null $action
	 */
	public function __construct(?string $bank_id, ?string $rc, ?string $action) {
		$this->bank_id = $bank_id;
		$this->rc = $rc;
		$this->action = $action;
	}

	/**
	 * @return string|null
	 */
	public function getBankId() : ?string {
		return $this->bank_id;
	}

	/**
	 * @return string|null
	 */
	public function getRc() : ?string {
		return $this->rc;
	}

	/**
	 * @return string|null
	 */
	public function getAction() : ?string {
		return $this->action;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['bank_id'] = $this->bank_id;

		$result['rc'] = $this->rc;

		$result['action'] = $this->action;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		$bank_id = $arr['bank_id'] ?? null;
		$bank_id = $bank_id === null ? null : (string)$bank_id;

		$rc = $arr['rc'] ?? null;
		$rc = $rc === null ? null : (string)$rc;

		$action = $arr['action'] ?? null;
		$action = $action === null ? null : (string)$action;

		return new self($bank_id, $rc, $action);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->bank_id === $x->bank_id

			&& $this->rc === $x->rc

			&& $this->action === $x->action;
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
