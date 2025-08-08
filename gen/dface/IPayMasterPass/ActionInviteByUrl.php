<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class ActionInviteByUrl implements JsonSerializable {

	private string $user_id;
	private string $msisdn;
	private string $lang;
	private string $success_url;
	private string $error_url;
	private bool $_dirty = false;

	/**
	 * @param string $user_id
	 * @param string $msisdn
	 * @param string $lang
	 * @param string $success_url
	 * @param string $error_url
	 */
	public function __construct(
		string $user_id,
		string $msisdn,
		string $lang,
		string $success_url,
		string $error_url
	) {
		$this->user_id = $user_id;
		$this->msisdn = $msisdn;
		$this->lang = $lang;
		$this->success_url = $success_url;
		$this->error_url = $error_url;
	}

	/**
	 * @return string
	 */
	public function getUserId() : string {
		return $this->user_id;
	}

	/**
	 * @return string
	 */
	public function getMsisdn() : string {
		return $this->msisdn;
	}

	/**
	 * @return string
	 */
	public function getLang() : string {
		return $this->lang;
	}

	/**
	 * @return string
	 */
	public function getSuccessUrl() : string {
		return $this->success_url;
	}

	/**
	 * @return string
	 */
	public function getErrorUrl() : string {
		return $this->error_url;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['user_id'] = $this->user_id;

		$result['msisdn'] = $this->msisdn;

		$result['lang'] = $this->lang;

		$result['success_url'] = $this->success_url;

		$result['error_url'] = $this->error_url;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		if (\array_key_exists('user_id', $arr)) {
			$user_id = $arr['user_id'];
		} else {
			throw new \InvalidArgumentException("Property 'user_id' not specified");
		}
		$user_id = $user_id === null ? null : (string)$user_id;

		if (\array_key_exists('msisdn', $arr)) {
			$msisdn = $arr['msisdn'];
		} else {
			throw new \InvalidArgumentException("Property 'msisdn' not specified");
		}
		$msisdn = $msisdn === null ? null : (string)$msisdn;

		if (\array_key_exists('lang', $arr)) {
			$lang = $arr['lang'];
		} else {
			throw new \InvalidArgumentException("Property 'lang' not specified");
		}
		$lang = $lang === null ? null : (string)$lang;

		if (\array_key_exists('success_url', $arr)) {
			$success_url = $arr['success_url'];
		} else {
			throw new \InvalidArgumentException("Property 'success_url' not specified");
		}
		$success_url = $success_url === null ? null : (string)$success_url;

		if (\array_key_exists('error_url', $arr)) {
			$error_url = $arr['error_url'];
		} else {
			throw new \InvalidArgumentException("Property 'error_url' not specified");
		}
		$error_url = $error_url === null ? null : (string)$error_url;

		return new self(
			$user_id,
			$msisdn,
			$lang,
			$success_url,
			$error_url);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->user_id === $x->user_id

			&& $this->msisdn === $x->msisdn

			&& $this->lang === $x->lang

			&& $this->success_url === $x->success_url

			&& $this->error_url === $x->error_url;
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
