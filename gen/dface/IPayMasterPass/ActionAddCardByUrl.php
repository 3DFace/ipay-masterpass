<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class ActionAddCardByUrl implements \JsonSerializable {

	/** @var string */
	private $user_id;
	/** @var string */
	private $msisdn;
	/** @var string */
	private $lang;
	/** @var string */
	private $success_url;
	/** @var string */
	private $error_url;

	public function __construct(
		string $user_id,
		string $msisdn,
		string $lang,
		string $success_url,
		string $error_url
	){
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

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['user_id'] = $this->user_id;

		$result['msisdn'] = $this->msisdn;

		$result['lang'] = $this->lang;

		$result['success_url'] = $this->success_url;

		$result['error_url'] = $this->error_url;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : ActionAddCardByUrl {
		if(array_key_exists('user_id', $arr)){
			$user_id = $arr['user_id'];
		}else{
			throw new \InvalidArgumentException("Property 'user_id' not specified");
		}
		$user_id = $user_id !== null ? (string)$user_id : null;

		if(array_key_exists('msisdn', $arr)){
			$msisdn = $arr['msisdn'];
		}else{
			throw new \InvalidArgumentException("Property 'msisdn' not specified");
		}
		$msisdn = $msisdn !== null ? (string)$msisdn : null;

		if(array_key_exists('lang', $arr)){
			$lang = $arr['lang'];
		}else{
			throw new \InvalidArgumentException("Property 'lang' not specified");
		}
		$lang = $lang !== null ? (string)$lang : null;

		if(array_key_exists('success_url', $arr)){
			$success_url = $arr['success_url'];
		}else{
			throw new \InvalidArgumentException("Property 'success_url' not specified");
		}
		$success_url = $success_url !== null ? (string)$success_url : null;

		if(array_key_exists('error_url', $arr)){
			$error_url = $arr['error_url'];
		}else{
			throw new \InvalidArgumentException("Property 'error_url' not specified");
		}
		$error_url = $error_url !== null ? (string)$error_url : null;

		return new static($user_id, $msisdn, $lang, $success_url, $error_url);
	}

}
