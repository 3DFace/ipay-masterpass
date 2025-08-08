<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use DateTimeImmutable;
use JsonSerializable;

final class RequestAuth implements JsonSerializable {

	private string $login;
	private DateTimeImmutable $time;
	private string $sign;
	private bool $_dirty = false;

	/**
	 * @param string $login
	 * @param DateTimeImmutable $time
	 * @param string $sign
	 */
	public function __construct(string $login, DateTimeImmutable $time, string $sign) {
		$this->login = $login;
		$this->time = $time;
		$this->sign = $sign;
	}

	/**
	 * @return string
	 */
	public function getLogin() : string {
		return $this->login;
	}

	/**
	 * @return DateTimeImmutable
	 */
	public function getTime() : DateTimeImmutable {
		return $this->time;
	}

	/**
	 * @return string
	 */
	public function getSign() : string {
		return $this->sign;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['login'] = $this->login;

		$result['time'] = $this->time->format('Y-m-d H:i:s');

		$result['sign'] = $this->sign;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		if (\array_key_exists('login', $arr)) {
			$login = $arr['login'];
		} else {
			throw new \InvalidArgumentException("Property 'login' not specified");
		}
		$login = $login === null ? null : (string)$login;

		if (\array_key_exists('time', $arr)) {
			$time = $arr['time'];
		} else {
			throw new \InvalidArgumentException("Property 'time' not specified");
		}
		$time = $time === null ? null : (static function ($x) {
			try {
				return new DateTimeImmutable($x);
			} catch (\Exception $e) {
				throw new \InvalidArgumentException($e->getMessage(), 0, $e);
			}
		})($time);

		if (\array_key_exists('sign', $arr)) {
			$sign = $arr['sign'];
		} else {
			throw new \InvalidArgumentException("Property 'sign' not specified");
		}
		$sign = $sign === null ? null : (string)$sign;

		return new self($login, $time, $sign);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->login === $x->login

			&& $this->time->getTimestamp() === $x->time->getTimestamp()

			&& $this->sign === $x->sign;
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
