<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class ActionInitWidgetSession implements \JsonSerializable {

	/** @var string */
	private $user_id;
	/** @var string */
	private $msisdn;
	/** @var mixed */
	private $pmt_info;
	/** @var string */
	private $pmt_desc;

	public function __construct(
		string $user_id,
		string $msisdn,
		$pmt_info,
		?string $pmt_desc
	){
		$this->user_id = $user_id;
		$this->msisdn = $msisdn;
		$this->pmt_info = $pmt_info;
		$this->pmt_desc = $pmt_desc;
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
	 * @return mixed
	 */
	public function getPmtInfo(){
		return $this->pmt_info;
	}

	/**
	 * @return string
	 */
	public function getPmtDesc() : ?string {
		return $this->pmt_desc;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['user_id'] = $this->user_id;

		$result['msisdn'] = $this->msisdn;

		$result['pmt_info'] = $this->pmt_info;

		$result['pmt_desc'] = $this->pmt_desc;

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : ActionInitWidgetSession {
		if(\array_key_exists('user_id', $arr)){
			$user_id = $arr['user_id'];
		}else{
			throw new \InvalidArgumentException("Property 'user_id' not specified");
		}
		$user_id = $user_id !== null ? (string)$user_id : null;

		if(\array_key_exists('msisdn', $arr)){
			$msisdn = $arr['msisdn'];
		}else{
			throw new \InvalidArgumentException("Property 'msisdn' not specified");
		}
		$msisdn = $msisdn !== null ? (string)$msisdn : null;

		if(\array_key_exists('pmt_info', $arr)){
			$pmt_info = $arr['pmt_info'];
		}else{
			throw new \InvalidArgumentException("Property 'pmt_info' not specified");
		}
		
		if(\array_key_exists('pmt_desc', $arr)){
			$pmt_desc = $arr['pmt_desc'];
		}else{
			throw new \InvalidArgumentException("Property 'pmt_desc' not specified");
		}
		$pmt_desc = $pmt_desc !== null ? (string)$pmt_desc : null;

		return new static($user_id, $msisdn, $pmt_info, $pmt_desc);
	}

}
