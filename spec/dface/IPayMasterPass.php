<?php

namespace dface\IPayMasterPass;

use dface\CodeGen\ClassName;
use dface\CodeGen\DateTimeType;
use dface\CodeGen\DynamicTypeDef;
use dface\CodeGen\JsonType;

return [

	'AgentSettings' => [
		'url' => 'string',
		'merchant_id' => 'string',
		'sign_key' => 'string',
	],

	'Request' => [
		'auth' => RequestAuth::class,
		'action' => 'string',
		'body' => 'mixed',
	],

	'CardInfo' => [
		'card_alias' => 'string',
		'mask' => 'string',
		'uid' => 'string',
		'is_expired' => ['type' => 'bool', 'default' => false],
		'is_corporate' => ['type' => 'bool', 'default' => false],
		'ref_no' => ['type' => 'string', 'alias' => 'RefNo', 'default' => null],
	],

	'RequestAuth' => [
		'login' => 'string',
		'time' => new DateTimeType('Y-m-d H:i:s'),
		'sign' => 'string',
	],

	'ActionList' => [
		'user_id' => 'string',
		'msisdn' => 'string',
	],

	'ActionCheck' => [
		'user_id' => 'string',
		'msisdn' => 'string',
	],

	'ActionCheckResponse' => [
		'user_status' => 'string',
	],

	'ActionInitWidgetSession' => [
		'user_id' => 'string',
		'msisdn' => 'string',
		'pmt_info' => ['type' => 'mixed', 'null' => true],
		'pmt_desc' => ['type' => 'string', 'null' => true],
	],

	'ActionInitWidgetSessionResponse' => [
		'session' => 'string',
	],

	'ActionInvite' => [
		'user_id' => 'string',
		'msisdn' => 'string',
	],

	'ActionInviteResponse' => [
		'verify' => 'string',
		'token' => 'string',
	],

	'ActionInviteByUrl' => [
		'user_id' => 'string',
		'msisdn' => 'string',
		'lang' => 'string',
		'success_url' => 'string',
		'error_url' => 'string',
	],

	'ActionInviteByUrlResponse' => [
		'url' => 'string',
	],

	'ActionRegisterByUrl' => [
		'user_id' => 'string',
		'msisdn' => 'string',
		'lang' => 'string',
		'success_url' => 'string',
		'error_url' => 'string',
	],

	'ActionRegisterByUrlResponse' => [
		'url' => 'string',
	],

	'ActionAddCardByUrl' => [
		'user_id' => 'string',
		'msisdn' => 'string',
		'lang' => 'string',
		'success_url' => 'string',
		'error_url' => 'string',
	],

	'ActionAddCardByUrlResponse' => [
		'url' => 'string',
	],

	'ActionOtp' => [
		'user_id' => 'string',
		'msisdn' => 'string',
		'token' => 'string',
		'value' => 'string',
	],

	'ActionOtpResponse' => [
		'status' => 'string',
	],

	'ActionPmtInfo' => [
		'acc' => ['type' => 'string', 'null' => true, 'empty' => null],
		'invoice' => ['type' => 'int', 'null' => true, 'empty' => null],
	],

	'ActionPaymentCreate' => [
		'user_id' => 'string',
		'msisdn' => 'string',
		'guid' => 'string',
		'invoice' => 'int',
		'card_alias' => 'string',
		'pmt_info' => ['type' => ActionPmtInfo::class],
		'pmt_desc' => ['type' => 'string', 'null' => true],
	],

	'BankResponse' => [
		'bank_id' => ['type' => 'string', 'null' => true, 'empty' => null],
		'rc' => ['type' => 'string', 'null' => true, 'empty' => null],
		'action' => ['type' => 'string', 'null' => true, 'empty' => null],
	],

	'ActionPaymentResponse' => [
		'msisdn' => 'string',
		'pmt_id' => 'int',
		'invoice' => 'int',
		'amount' => 'int',
		'pmt_status' => ['type' => 'int', 'with' => true],
		'pmt_info' => ['type' => ActionPmtInfo::class, 'empty' => []],
		'card_alias' => 'string',
		'card_mask' => 'string',
		'bank_response' => ['type' => BankResponse::class, 'with' => true],
		'secure' => ['type' => 'string', 'default' => null, 'with' => true],
		'token' => ['type' => 'string', 'default' => null, 'with' => true],
		'ascUrl' => ['type' => 'string', 'default' => null, 'with' => true],
		'pareq' => ['type' => 'string', 'default' => null, 'with' => true],
		'md' => ['type' => 'string', 'default' => null, 'with' => true],
	],

	'ActionPaymentSale' => [
		'user_id' => 'string',
		'msisdn' => 'string',
		'pmt_id' => 'int',
		'invoice' => 'int',
		'guid' => 'string',
	],

	'ActionPaymentCancel' => [
		'user_id' => 'string',
		'msisdn' => 'string',
		'pmt_id' => 'int',
		'invoice' => 'int',
		'guid' => 'string',
	],

	'ActionPaymentStatusRequest' => [
		'user_id' => 'string',
		'msisdn' => 'string',
		'guid' => 'string',
	],

	'StatusResponseItem' => [
		'type' => 'string',
		'msisdn' => 'string',
		'response' => new JsonType(new DynamicTypeDef(new ClassName(StatusResponseItemEnvelope::class)), 0, 0, true),
	],

	'StatusResponseItemEnvelope' => [
		'response' => ActionPaymentResponse::class,
	],

	'ActionDeleteCard' => [
		'user_id' => 'string',
		'msisdn' => 'string',
		'card_alias' => 'string',
	],

	'ActionDeleteCardResponse' => [
		'status' => 'string',
	],

	'P2PPaymentSender' => [
		'card_alias' => 'string',
	],

	'P2PPaymentTarget' => [
		'pan' => 'string',
	],

	'P2PPaymentFunds' => [
		'invoice' => 'int',
		'currency' => 'string',
	],

	'P2PPaymentNotification' => [
		'kind' => 'string',
		'adres' => 'string',
		'text' => 'string',
	],

	'P2PActionPaymentCreate' => [
		'user_id' => 'string',
		'msisdn' => 'string',
		'sender' => P2PPaymentSender::class,
		'target' => P2PPaymentTarget::class,
		'funds' => P2PPaymentFunds::class,
		'notifications' => P2PPaymentNotification::class.'[]',
	],

	'P2PActionPaymentResponseInfo' => [
		'sender_phone' => 'string',
		'sender_card' => 'string',
		'target_card' => 'string',
		'invoice' => 'int',
		'amount' => 'int',
		'currency' => 'string',
		'notification_cost' => 'int',
		'notifications' => 'mixed[]',
	],

	'P2PActionPaymentResponseError' => [
		'err_group' => 'string',
		'err_reason' => 'string',
	],

	'P2PActionPaymentResponse' => [
		'status' => 'int',
		'pmt_id' => 'string',
		'mch_id' => 'string',
		'guid' => 'string',
		'init_date' => 'DateTime',
		'pay_date' => 'DateTime',
		'info' => P2PActionPaymentResponseInfo::class,
		'security_rate' => ['type' => 'string', 'default' => null],
		'security_data' => ['type' => 'mixed[]', 'default' => null],
		'error' => ['type' => P2PActionPaymentResponseError::class, 'default' => null],
		'ident' => ['type' => 'string', 'default' => null],
	],

	'P2PActionPaymentSale' => [
		'user_id' => 'string',
		'msisdn' => 'string',
		'pmt_id' => 'string',
		'verification' => 'mixed{}',
	],

	'P2PPaymentStatusRequest' => [
		'user_id' => 'string',
		'msisdn' => 'string',
		'pmt_id' => 'string',
	],

];
