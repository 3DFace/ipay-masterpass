<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class StatusResponseItem implements \JsonSerializable {

	/** @var string */
	private $type;
	/** @var string */
	private $msisdn;
	/** @var ActionPaymentResponse */
	private $response;

	public function __construct(string $type, string $msisdn, ActionPaymentResponse $response){
		$this->type = $type;
		$this->msisdn = $msisdn;
		$this->response = $response;
	}

	/**
	 * @return string
	 */
	public function getType() : string {
		return $this->type;
	}

	/**
	 * @return string
	 */
	public function getMsisdn() : string {
		return $this->msisdn;
	}

	/**
	 * @return ActionPaymentResponse
	 */
	public function getResponse() : ActionPaymentResponse {
		return $this->response;
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize(){

		$result = [];

		$result['type'] = $this->type;

		$result['msisdn'] = $this->msisdn;

		$result['response'] = \call_user_func(function (\JsonSerializable $val){
			$x = $val->jsonSerialize();
			return \json_encode($x, 0);
		}, $this->response);

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : StatusResponseItem {
		if(\array_key_exists('type', $arr)){
			$type = $arr['type'];
		}else{
			throw new \InvalidArgumentException("Property 'type' not specified");
		}
		$type = $type !== null ? (string)$type : null;

		if(\array_key_exists('msisdn', $arr)){
			$msisdn = $arr['msisdn'];
		}else{
			throw new \InvalidArgumentException("Property 'msisdn' not specified");
		}
		$msisdn = $msisdn !== null ? (string)$msisdn : null;

		if(\array_key_exists('response', $arr)){
			$response = $arr['response'];
		}else{
			throw new \InvalidArgumentException("Property 'response' not specified");
		}
		$response = $response !== null ? \call_user_func(function ($val){
			$x = \json_decode($val, true, 512, 0);
			try {
				$x = $x !== null ? ActionPaymentResponse::deserialize($x) : null;
			}catch (\Exception $e){
				throw new \InvalidArgumentException('Deserialization error: '.$e->getMessage(), 0, $e);
			}
			return $x;
		}, $response) : null;

		return new static($type, $msisdn, $response);
	}

}
