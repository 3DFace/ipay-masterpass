<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use DateTimeImmutable;

class RequestAuth implements \JsonSerializable {

	/** @var string */
	private $login;
	/** @var DateTimeImmutable */
	private $time;
	/** @var string */
	private $sign;

	public function __construct(string $login, DateTimeImmutable $time, string $sign){
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

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['login'] = $this->login;

		$result['time'] = $this->time->format('Y-m-d H:i:s');

		$result['sign'] = $this->sign;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : RequestAuth {
		if(\array_key_exists('login', $arr)){
			$login = $arr['login'];
		}else{
			throw new \InvalidArgumentException("Property 'login' not specified");
		}
		$login = $login !== null ? (string)$login : null;

		if(\array_key_exists('time', $arr)){
			$time = $arr['time'];
		}else{
			throw new \InvalidArgumentException("Property 'time' not specified");
		}
		try {
			$time = $time !== null ? new DateTimeImmutable($time) : null;
		}catch (\Exception $e){
			throw new \InvalidArgumentException($e->getMessage(), 0, $e);
		}

		if(\array_key_exists('sign', $arr)){
			$sign = $arr['sign'];
		}else{
			throw new \InvalidArgumentException("Property 'sign' not specified");
		}
		$sign = $sign !== null ? (string)$sign : null;

		return new static($login, $time, $sign);
	}

}
