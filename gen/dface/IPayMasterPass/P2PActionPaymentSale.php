<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use JsonSerializable;

final class P2PActionPaymentSale implements JsonSerializable {

	private string $user_id;
	private string $msisdn;
	private string $pmt_id;
	private array $verification;
	private bool $_dirty = false;

	/**
	 * @param string $user_id
	 * @param string $msisdn
	 * @param string $pmt_id
	 * @param array $verification
	 */
	public function __construct(
		string $user_id,
		string $msisdn,
		string $pmt_id,
		array $verification
	) {
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
	 * @return array
	 */
	public function getVerification() : array {
		return $this->verification;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['user_id'] = $this->user_id;

		$result['msisdn'] = $this->msisdn;

		$result['pmt_id'] = $this->pmt_id;

		$result['verification'] = (static function (array $map) {
			$x = [];
			foreach ($map as $k => $v) {
				/** @var mixed $v */
				$x[$k] = $v;
			}
			return $x ?: new \stdClass();
		})($this->verification);

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

		if (\array_key_exists('pmt_id', $arr)) {
			$pmt_id = $arr['pmt_id'];
		} else {
			throw new \InvalidArgumentException("Property 'pmt_id' not specified");
		}
		$pmt_id = $pmt_id === null ? null : (string)$pmt_id;

		if (\array_key_exists('verification', $arr)) {
			$verification = $arr['verification'];
		} else {
			throw new \InvalidArgumentException("Property 'verification' not specified");
		}
		$verification = $verification === null ? null : (static function ($map) {
			$x = [];
			foreach ($map as $k => $v) {
				$x[$k] = $v;
			}
			return $x;
		})($verification);

		return new self(
			$user_id,
			$msisdn,
			$pmt_id,
			$verification);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->user_id === $x->user_id

			&& $this->msisdn === $x->msisdn

			&& $this->pmt_id === $x->pmt_id

			&& \count($this->verification) === \count($x->verification)
			&& (static function ($map1, $map2) {
				foreach ($map1 as $k => $v1) {
					if (!isset($map2[$k])) {
						return false;
					}
					$v2 = $map2[$k];
					$v_eq = $v1 === $v2;
					if (!$v_eq) {
						return false;
					}
				}
				return true;
			})($this->verification, $x->verification);
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
