<?php

/** Generated class. Don't edit manually. */

namespace dface\IPayMasterPass;

use DateTimeImmutable;
use JsonSerializable;

final class P2PActionPaymentResponse implements JsonSerializable {

	private int $status;
	private string $pmt_id;
	private string $mch_id;
	private string $guid;
	private DateTimeImmutable $init_date;
	private DateTimeImmutable $pay_date;
	private P2PActionPaymentResponseInfo $info;
	private ?string $security_rate;
	private ?array $security_data;
	private ?P2PActionPaymentResponseError $error;
	private ?string $ident;
	private bool $_dirty = false;

	/**
	 * @param int $status
	 * @param string $pmt_id
	 * @param string $mch_id
	 * @param string $guid
	 * @param DateTimeImmutable $init_date
	 * @param DateTimeImmutable $pay_date
	 * @param P2PActionPaymentResponseInfo $info
	 * @param string|null $security_rate
	 * @param array|null $security_data
	 * @param P2PActionPaymentResponseError|null $error
	 * @param string|null $ident
	 */
	public function __construct(
		int $status,
		string $pmt_id,
		string $mch_id,
		string $guid,
		DateTimeImmutable $init_date,
		DateTimeImmutable $pay_date,
		P2PActionPaymentResponseInfo $info,
		?string $security_rate = null,
		?array $security_data = null,
		?P2PActionPaymentResponseError $error = null,
		?string $ident = null
	) {
		$this->status = $status;
		$this->pmt_id = $pmt_id;
		$this->mch_id = $mch_id;
		$this->guid = $guid;
		$this->init_date = $init_date;
		$this->pay_date = $pay_date;
		$this->info = $info;
		$this->security_rate = $security_rate;
		$this->security_data = $security_data;
		$this->error = $error;
		$this->ident = $ident;
	}

	/**
	 * @return int
	 */
	public function getStatus() : int {
		return $this->status;
	}

	/**
	 * @return string
	 */
	public function getPmtId() : string {
		return $this->pmt_id;
	}

	/**
	 * @return string
	 */
	public function getMchId() : string {
		return $this->mch_id;
	}

	/**
	 * @return string
	 */
	public function getGuid() : string {
		return $this->guid;
	}

	/**
	 * @return DateTimeImmutable
	 */
	public function getInitDate() : DateTimeImmutable {
		return $this->init_date;
	}

	/**
	 * @return DateTimeImmutable
	 */
	public function getPayDate() : DateTimeImmutable {
		return $this->pay_date;
	}

	/**
	 * @return P2PActionPaymentResponseInfo
	 */
	public function getInfo() : P2PActionPaymentResponseInfo {
		return $this->info;
	}

	/**
	 * @return string|null
	 */
	public function getSecurityRate() : ?string {
		return $this->security_rate;
	}

	/**
	 * @return array|null
	 */
	public function getSecurityData() : ?array {
		return $this->security_data;
	}

	/**
	 * @return P2PActionPaymentResponseError|null
	 */
	public function getError() : ?P2PActionPaymentResponseError {
		return $this->error;
	}

	/**
	 * @return string|null
	 */
	public function getIdent() : ?string {
		return $this->ident;
	}

	public function jsonSerialize() : array|object {

		$result = [];

		$result['status'] = $this->status;

		$result['pmt_id'] = $this->pmt_id;

		$result['mch_id'] = $this->mch_id;

		$result['guid'] = $this->guid;

		$result['init_date'] = $this->init_date->format('Y-m-d H:i:s');

		$result['pay_date'] = $this->pay_date->format('Y-m-d H:i:s');

		$result['info'] = $this->info->jsonSerialize();

		$result['security_rate'] = $this->security_rate;

		$result['security_data'] = $this->security_data === null ? null : \array_map(static function ($x) {
			return $x;
		}, $this->security_data);

		$result['error'] = $this->error?->jsonSerialize();

		$result['ident'] = $this->ident;

		return $result ?: new \stdClass();
	}

	/**
	 * @param object|array $data
	 * @return self
	 * @throws \InvalidArgumentException
	 */
	public static function deserialize(object|array $data) : self {
		$arr = (array)$data;
		if (\array_key_exists('status', $arr)) {
			$status = $arr['status'];
		} else {
			throw new \InvalidArgumentException("Property 'status' not specified");
		}
		$status = $status === null ? null : (int)$status;

		if (\array_key_exists('pmt_id', $arr)) {
			$pmt_id = $arr['pmt_id'];
		} else {
			throw new \InvalidArgumentException("Property 'pmt_id' not specified");
		}
		$pmt_id = $pmt_id === null ? null : (string)$pmt_id;

		if (\array_key_exists('mch_id', $arr)) {
			$mch_id = $arr['mch_id'];
		} else {
			throw new \InvalidArgumentException("Property 'mch_id' not specified");
		}
		$mch_id = $mch_id === null ? null : (string)$mch_id;

		if (\array_key_exists('guid', $arr)) {
			$guid = $arr['guid'];
		} else {
			throw new \InvalidArgumentException("Property 'guid' not specified");
		}
		$guid = $guid === null ? null : (string)$guid;

		if (\array_key_exists('init_date', $arr)) {
			$init_date = $arr['init_date'];
		} else {
			throw new \InvalidArgumentException("Property 'init_date' not specified");
		}
		$init_date = $init_date === null ? null : (static function ($x) {
			try {
				return new DateTimeImmutable($x);
			} catch (\Exception $e) {
				throw new \InvalidArgumentException($e->getMessage(), 0, $e);
			}
		})($init_date);

		if (\array_key_exists('pay_date', $arr)) {
			$pay_date = $arr['pay_date'];
		} else {
			throw new \InvalidArgumentException("Property 'pay_date' not specified");
		}
		$pay_date = $pay_date === null ? null : (static function ($x) {
			try {
				return new DateTimeImmutable($x);
			} catch (\Exception $e) {
				throw new \InvalidArgumentException($e->getMessage(), 0, $e);
			}
		})($pay_date);

		if (\array_key_exists('info', $arr)) {
			$info = $arr['info'];
		} else {
			throw new \InvalidArgumentException("Property 'info' not specified");
		}
		$info = $info === null ? null : P2PActionPaymentResponseInfo::deserialize($info);

		$security_rate = $arr['security_rate'] ?? null;
		$security_rate = $security_rate === null ? null : (string)$security_rate;

		$security_data = $arr['security_data'] ?? null;
		$security_data = $security_data === null ? null : \array_map(static function ($x) {
			return $x;
		}, $security_data);

		$error = $arr['error'] ?? null;
		$error = $error === null ? null : P2PActionPaymentResponseError::deserialize($error);

		$ident = $arr['ident'] ?? null;
		$ident = $ident === null ? null : (string)$ident;

		return new self(
			$status,
			$pmt_id,
			$mch_id,
			$guid,
			$init_date,
			$pay_date,
			$info,
			$security_rate,
			$security_data,
			$error,
			$ident);
	}

	/**
	 * @param self|null $x
	 * @return bool
	 */
	public function equals(?self $x) : bool {

		return $x !== null

			&& $this->status === $x->status

			&& $this->pmt_id === $x->pmt_id

			&& $this->mch_id === $x->mch_id

			&& $this->guid === $x->guid

			&& $this->init_date->getTimestamp() === $x->init_date->getTimestamp()

			&& $this->pay_date->getTimestamp() === $x->pay_date->getTimestamp()

			&& $this->info->equals($x->info)

			&& $this->security_rate === $x->security_rate

			&& (($this->security_data === null && $x->security_data === null)
				|| ($this->security_data !== null && $x->security_data !== null
					&& \count($this->security_data) === \count($x->security_data)
					&& (static function ($arr1, $arr2) {
						foreach ($arr1 as $i => $v1) {
							if (!isset($arr2[$i])) {
								return false;
							}
							$v2 = $arr2[$i];
							$v_eq = $v1 === $v2;
							if (!$v_eq) {
								return false;
							}
						}
						return true;
					})($this->security_data, $x->security_data)))

			&& (($this->error === $x->error)
				|| ($this->error !== null && $x->error !== null
					&& $this->error->equals($x->error)))

			&& $this->ident === $x->ident;
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
