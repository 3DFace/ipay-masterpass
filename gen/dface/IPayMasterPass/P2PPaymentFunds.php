<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class P2PPaymentFunds implements JsonSerializable {

	private int $invoice;
	private string $currency;
	private bool $_dirty = false;

	/**
	 * @param int $invoice
	 * @param string $currency
	 */
	public function __construct(int $invoice, string $currency) {
		$this->invoice = $invoice;
		$this->currency = $currency;
	}

	/**
	 * @return int
	 */
	public function getInvoice() : int {
		return $this->invoice;
	}

	/**
	 * @return string
	 */
	public function getCurrency() : string {
		return $this->currency;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['invoice'] = $this->invoice;

		$result['currency'] = $this->currency;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		if (\array_key_exists('invoice', $arr)) {
			$invoice = $arr['invoice'];
		} else {
			throw new \InvalidArgumentException("Property 'invoice' not specified");
		}
		$invoice = $invoice === null ? null : (int)$invoice;

		if (\array_key_exists('currency', $arr)) {
			$currency = $arr['currency'];
		} else {
			throw new \InvalidArgumentException("Property 'currency' not specified");
		}
		$currency = $currency === null ? null : (string)$currency;

		return new self($invoice, $currency);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->invoice === $x->invoice

			&& $this->currency === $x->currency;
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
