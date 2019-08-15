<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class Request implements \JsonSerializable {

	/** @var RequestAuth */
	private $auth;
	/** @var string */
	private $action;
	/** @var mixed */
	private $body;

	public function __construct(RequestAuth $auth, string $action, $body){
		$this->auth = $auth;
		$this->action = $action;
		$this->body = $body;
	}

	/**
	 * @return RequestAuth
	 */
	public function getAuth() : RequestAuth {
		return $this->auth;
	}

	/**
	 * @return string
	 */
	public function getAction() : string {
		return $this->action;
	}

	/**
	 * @return mixed
	 */
	public function getBody(){
		return $this->body;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['auth'] = $this->auth->jsonSerialize();

		$result['action'] = $this->action;

		$result['body'] = $this->body;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : Request {
		if(\array_key_exists('auth', $arr)){
			$auth = $arr['auth'];
		}else{
			throw new \InvalidArgumentException("Property 'auth' not specified");
		}
		try {
			$auth = $auth !== null ? RequestAuth::deserialize($auth) : null;
		}catch (\Exception $e){
			throw new \InvalidArgumentException('Deserialization error: '.$e->getMessage(), 0, $e);
		}

		if(\array_key_exists('action', $arr)){
			$action = $arr['action'];
		}else{
			throw new \InvalidArgumentException("Property 'action' not specified");
		}
		$action = $action !== null ? (string)$action : null;

		if(\array_key_exists('body', $arr)){
			$body = $arr['body'];
		}else{
			throw new \InvalidArgumentException("Property 'body' not specified");
		}
		
		return new static($auth, $action, $body);
	}

}
