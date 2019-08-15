<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class P2PActionPaymentSale implements \JsonSerializable {

	/** @var string */
	private $user_id;
	/** @var string */
	private $msisdn;
	/** @var string */
	private $pmt_id;
	/** @var mixed[] */
	private $verification;

	public function __construct(
		string $user_id,
		string $msisdn,
		string $pmt_id,
		array $verification
	){
		$this->user_id = $user_id;
		$this->msisdn = $msisdn;
		$this->pmt_id = $pmt_id;
		$this->verification = $verification;
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
	public function getPmtId() : string {
		return $this->pmt_id;
	}

	/**
	 * @return mixed[]
	 */
	public function getVerification() : array {
		return $this->verification;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['user_id'] = $this->user_id;

		$result['msisdn'] = $this->msisdn;

		$result['pmt_id'] = $this->pmt_id;

		$result['verification'] = \call_user_func(function (array $map){
			$x = [];
			foreach($map as $k => $v){
				/** @var mixed $v */
				$x[$k] = $v;
			}
			return $x;
		}, $this->verification);

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : P2PActionPaymentSale {
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

		if(\array_key_exists('pmt_id', $arr)){
			$pmt_id = $arr['pmt_id'];
		}else{
			throw new \InvalidArgumentException("Property 'pmt_id' not specified");
		}
		$pmt_id = $pmt_id !== null ? (string)$pmt_id : null;

		if(\array_key_exists('verification', $arr)){
			$verification = $arr['verification'];
		}else{
			throw new \InvalidArgumentException("Property 'verification' not specified");
		}
		$verification = $verification !== null ? \call_user_func(function (array $map){
			$x = [];
			foreach($map as $k => $v){
				$x[$k] = $v;
			}
			return $x;
		}, $verification) : null;

		return new static($user_id, $msisdn, $pmt_id, $verification);
	}

}
