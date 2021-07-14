<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class P2PPaymentNotification implements JsonSerializable {

	private string $kind;
	private string $adres;
	private string $text;
	private bool $_dirty = false;

	/**
	 * @param string $kind
	 * @param string $adres
	 * @param string $text
	 */
	public function __construct(string $kind, string $adres, string $text) {
		$this->kind = $kind;
		$this->adres = $adres;
		$this->text = $text;
	}

	/**
	 * @return string
	 */
	public function getKind() : string {
		return $this->kind;
	}

	/**
	 * @return string
	 */
	public function getAdres() : string {
		return $this->adres;
	}

	/**
	 * @return string
	 */
	public function getText() : string {
		return $this->text;
	}

	/**
	 * @return array|\stdClass
	 */
	public function jsonSerialize() {

		$result = [];

		$result['kind'] = $this->kind;

		$result['adres'] = $this->adres;

		$result['text'] = $this->text;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize($data) : self {
		$arr = (array)$data;
		if (\array_key_exists('kind', $arr)) {
			$kind = $arr['kind'];
		} else {
			throw new \InvalidArgumentException("Property 'kind' not specified");
		}
		$kind = $kind === null ? null : (string)$kind;

		if (\array_key_exists('adres', $arr)) {
			$adres = $arr['adres'];
		} else {
			throw new \InvalidArgumentException("Property 'adres' not specified");
		}
		$adres = $adres === null ? null : (string)$adres;

		if (\array_key_exists('text', $arr)) {
			$text = $arr['text'];
		} else {
			throw new \InvalidArgumentException("Property 'text' not specified");
		}
		$text = $text === null ? null : (string)$text;

		return new self($kind, $adres, $text);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->kind === $x->kind

			&& $this->adres === $x->adres

			&& $this->text === $x->text;
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
