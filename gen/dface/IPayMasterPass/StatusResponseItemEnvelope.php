<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

class StatusResponseItemEnvelope implements \JsonSerializable {

	/** @var ActionPaymentResponse */
	private $response;

	public function __construct(ActionPaymentResponse $response){
		$this->response = $response;
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

		$result['response'] = $this->response->jsonSerialize();

		return $result;
	}

	/**
	 * @param array $arr
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(array $arr) : StatusResponseItemEnvelope {
		if(\array_key_exists('response', $arr)){
			$response = $arr['response'];
		}else{
			throw new \InvalidArgumentException("Property 'response' not specified");
		}
		try {
			$response = $response !== null ? ActionPaymentResponse::deserialize($response) : null;
		}catch (\Exception $e){
			throw new \InvalidArgumentException('Deserialization error: '.$e->getMessage(), 0, $e);
		}

		return new static($response);
	}

}
