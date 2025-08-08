<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class ActionPmtInfo implements JsonSerializable {

	private ?string $acc;
	private ?int $invoice;
	private bool $_dirty = false;

	/**
	 * @param string|null $acc
	 * @param int|null $invoice
	 */
	public function __construct(?string $acc, ?int $invoice) {
		$this->acc = $acc;
		$this->invoice = $invoice;
	}

	/**
	 * @return string|null
	 */
	public function getAcc() : ?string {
		return $this->acc;
	}

	/**
	 * @return int|null
	 */
	public function getInvoice() : ?int {
		return $this->invoice;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['acc'] = $this->acc;

		$result['invoice'] = $this->invoice;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		$acc = $arr['acc'] ?? null;
		$acc = $acc === null ? null : (string)$acc;

		$invoice = $arr['invoice'] ?? null;
		$invoice = $invoice === null ? null : (int)$invoice;

		return new self($acc, $invoice);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->acc === $x->acc

			&& $this->invoice === $x->invoice;
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
