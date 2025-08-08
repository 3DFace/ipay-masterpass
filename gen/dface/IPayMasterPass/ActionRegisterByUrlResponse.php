<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class ActionRegisterByUrlResponse implements JsonSerializable {

	private string $url;
	private bool $_dirty = false;

	/**
	 * @param string $url
	 */
	public function __construct(string $url) {
		$this->url = $url;
	}

	/**
	 * @return string
	 */
	public function getUrl() : string {
		return $this->url;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['url'] = $this->url;

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

		return new self($url);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->url === $x->url;
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
