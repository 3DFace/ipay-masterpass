<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class StatusResponseItem implements JsonSerializable {

	private string $type;
	private string $msisdn;
	private StatusResponseItemEnvelope $response;
	private bool $_dirty = false;

	/**
	 * @param string $type
	 * @param string $msisdn
	 * @param StatusResponseItemEnvelope $response
	 */
	public function __construct(string $type, string $msisdn, StatusResponseItemEnvelope $response) {
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
	 * @return StatusResponseItemEnvelope
	 */
	public function getResponse() : StatusResponseItemEnvelope {
		return $this->response;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['type'] = $this->type;

		$result['msisdn'] = $this->msisdn;

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
		if (\array_key_exists('type', $arr)) {
			$type = $arr['type'];
		} else {
			throw new \InvalidArgumentException("Property 'type' not specified");
		}
		$type = $type === null ? null : (string)$type;

		if (\array_key_exists('msisdn', $arr)) {
			$msisdn = $arr['msisdn'];
		} else {
			throw new \InvalidArgumentException("Property 'msisdn' not specified");
		}
		$msisdn = $msisdn === null ? null : (string)$msisdn;

		if (\array_key_exists('response', $arr)) {
			$response = $arr['response'];
		} else {
			throw new \InvalidArgumentException("Property 'response' not specified");
		}
		$response = $response === null ? null : (static function ($x) {
			try {
				$decoded = \json_decode($x, true, 512, 0 | JSON_THROW_ON_ERROR);
			} catch (\Exception $e) {
				throw new \InvalidArgumentException($e->getMessage(), 0, $e);
			}
			return $decoded === null ? null : StatusResponseItemEnvelope::deserialize($decoded);
		})($response);

		return new self($type, $msisdn, $response);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->type === $x->type

			&& $this->msisdn === $x->msisdn

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
