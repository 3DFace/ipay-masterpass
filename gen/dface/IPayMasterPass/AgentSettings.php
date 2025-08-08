<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class AgentSettings implements JsonSerializable {

	private string $url;
	private string $merchant_id;
	private string $sign_key;
	private bool $_dirty = false;

	/**
	 * @param string $url
	 * @param string $merchant_id
	 * @param string $sign_key
	 */
	public function __construct(string $url, string $merchant_id, string $sign_key) {
		$this->url = $url;
		$this->merchant_id = $merchant_id;
		$this->sign_key = $sign_key;
	}

	/**
	 * @return string
	 */
	public function getUrl() : string {
		return $this->url;
	}

	/**
	 * @return string
	 */
	public function getMerchantId() : string {
		return $this->merchant_id;
	}

	/**
	 * @return string
	 */
	public function getSignKey() : string {
		return $this->sign_key;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['url'] = $this->url;

		$result['merchant_id'] = $this->merchant_id;

		$result['sign_key'] = $this->sign_key;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		if (\array_key_exists('url', $arr)) {
			$url = $arr['url'];
		} else {
			throw new \InvalidArgumentException("Property 'url' not specified");
		}
		$url = $url === null ? null : (string)$url;

		if (\array_key_exists('merchant_id', $arr)) {
			$merchant_id = $arr['merchant_id'];
		} else {
			throw new \InvalidArgumentException("Property 'merchant_id' not specified");
		}
		$merchant_id = $merchant_id === null ? null : (string)$merchant_id;

		if (\array_key_exists('sign_key', $arr)) {
			$sign_key = $arr['sign_key'];
		} else {
			throw new \InvalidArgumentException("Property 'sign_key' not specified");
		}
		$sign_key = $sign_key === null ? null : (string)$sign_key;

		return new self($url, $merchant_id, $sign_key);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->url === $x->url

			&& $this->merchant_id === $x->merchant_id

			&& $this->sign_key === $x->sign_key;
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
