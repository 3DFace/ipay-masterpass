<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class AgentSettings implements \JsonSerializable {

	/** @var string */
	private $url;
	/** @var string */
	private $merchant_id;
	/** @var string */
	private $sign_key;

	public function __construct(string $url, string $merchant_id, string $sign_key){
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

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['url'] = $this->url;

		$result['merchant_id'] = $this->merchant_id;

		$result['sign_key'] = $this->sign_key;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : AgentSettings {
		if(array_key_exists('url', $arr)){
			$url = $arr['url'];
		}else{
			throw new \InvalidArgumentException("Property 'url' not specified");
		}
		$url = $url !== null ? (string)$url : null;

		if(array_key_exists('merchant_id', $arr)){
			$merchant_id = $arr['merchant_id'];
		}else{
			throw new \InvalidArgumentException("Property 'merchant_id' not specified");
		}
		$merchant_id = $merchant_id !== null ? (string)$merchant_id : null;

		if(array_key_exists('sign_key', $arr)){
			$sign_key = $arr['sign_key'];
		}else{
			throw new \InvalidArgumentException("Property 'sign_key' not specified");
		}
		$sign_key = $sign_key !== null ? (string)$sign_key : null;

		return new static($url, $merchant_id, $sign_key);
	}

}
