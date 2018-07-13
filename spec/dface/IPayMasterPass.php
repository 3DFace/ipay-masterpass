<?php

namespace dface\IPayMasterPass;

use dface\CodeGen\DateTimeType;

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
		'pmt_info' => ['type' => 'string', 'null' => true],
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

	'ActionDeleteCard' => [
		'user_id' => 'string',
		'msisdn' => 'string',
		'card_alias' => 'string',
	],

	'ActionDeleteCardResponse' => [
		'status' => 'string',
	],

];
