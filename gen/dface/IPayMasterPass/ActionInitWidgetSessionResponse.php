<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class ActionInitWidgetSessionResponse implements JsonSerializable {

	private string $session;
	private bool $_dirty = false;

	/**
	 * @param string $session
	 */
	public function __construct(string $session) {
		$this->session = $session;
	}

	/**
	 * @return string
	 */
	public function getSession() : string {
		return $this->session;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['session'] = $this->session;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		if (\array_key_exists('session', $arr)) {
			$session = $arr['session'];
		} else {
			throw new \InvalidArgumentException("Property 'session' not specified");
		}
		$session = $session === null ? null : (string)$session;

		return new self($session);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->session === $x->session;
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
