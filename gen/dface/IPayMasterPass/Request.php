<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class Request implements JsonSerializable {

	private RequestAuth $auth;
	private string $action;
	private $body;
	private bool $_dirty = false;

	/**
	 * @param RequestAuth $auth
	 * @param string $action
	 * @param mixed $body
	 */
	public function __construct(RequestAuth $auth, string $action, $body) {
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

	public function jsonSerialize() : array|object {

		$result = [];

		$result['auth'] = $this->auth->jsonSerialize();

		$result['action'] = $this->action;

		$result['body'] = $this->body;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		if (\array_key_exists('auth', $arr)) {
			$auth = $arr['auth'];
		} else {
			throw new \InvalidArgumentException("Property 'auth' not specified");
		}
		$auth = $auth === null ? null : RequestAuth::deserialize($auth);

		if (\array_key_exists('action', $arr)) {
			$action = $arr['action'];
		} else {
			throw new \InvalidArgumentException("Property 'action' not specified");
		}
		$action = $action === null ? null : (string)$action;

		if (\array_key_exists('body', $arr)) {
			$body = $arr['body'];
		} else {
			throw new \InvalidArgumentException("Property 'body' not specified");
		}
		return new self($auth, $action, $body);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->auth->equals($x->auth)

			&& $this->action === $x->action

			&& $this->body === $x->body;
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
