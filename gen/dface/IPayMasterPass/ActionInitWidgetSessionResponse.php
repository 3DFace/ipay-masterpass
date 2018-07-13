<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class ActionInitWidgetSessionResponse implements \JsonSerializable {

	/** @var string */
	private $session;

	public function __construct(string $session){
		$this->session = $session;
	}

	/**
	 * @return string
	 */
	public function getSession() : string {
		return $this->session;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['session'] = $this->session;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : ActionInitWidgetSessionResponse {
		if(array_key_exists('session', $arr)){
			$session = $arr['session'];
		}else{
			throw new \InvalidArgumentException("Property 'session' not specified");
		}
		$session = $session !== null ? (string)$session : null;

		return new static($session);
	}

}
