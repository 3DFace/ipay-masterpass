<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class StatusResponseItemEnvelope implements JsonSerializable {

	private ActionPaymentResponse $response;
	private bool $_dirty = false;

	/**
	 * @param ActionPaymentResponse $response
	 */
	public function __construct(ActionPaymentResponse $response) {
		$this->response = $response;
	}

	/**
	 * @return ActionPaymentResponse
	 */
	public function getResponse() : ActionPaymentResponse {
		return $this->response;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['response'] = $this->response->jsonSerialize();

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		if (\array_key_exists('response', $arr)) {
			$response = $arr['response'];
		} else {
			throw new \InvalidArgumentException("Property 'response' not specified");
		}
		$response = $response === null ? null : ActionPaymentResponse::deserialize($response);

		return new self($response);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->response->equals($x->response);
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
