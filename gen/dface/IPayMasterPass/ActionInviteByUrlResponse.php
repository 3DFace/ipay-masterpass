<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class ActionInviteByUrlResponse implements \JsonSerializable {

	/** @var string */
	private $url;

	public function __construct(string $url){
		$this->url = $url;
	}

	/**
	 * @return string
	 */
	public function getUrl() : string {
		return $this->url;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['url'] = $this->url;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : ActionInviteByUrlResponse {
		if(array_key_exists('url', $arr)){
			$url = $arr['url'];
		}else{
			throw new \InvalidArgumentException("Property 'url' not specified");
		}
		$url = $url !== null ? (string)$url : null;

		return new static($url);
	}

}
