<?php

namespace dface\IPayMasterPass;

use dface\CodeGen\DateTimeType;
use dface\CodeGen\DTOGenerator;
use dface\CodeGen\MixedType;
use dface\CodeGen\PhpFilesSpecSource;
use dface\CodeGen\Psr0ClassWriter;
use dface\CodeGen\ScalarType;
use dface\CodeGen\TimeStampType;

include_once __DIR__.'/bootstrap.php';

$predefinedTypes = [
	'string' => new ScalarType('string'),
	'int' => new ScalarType('int'),
	'float' => new ScalarType('float'),
	'bool' => new ScalarType('bool'),
	'mixed' => new MixedType(),
	'DateTime' => new DateTimeType('Y-m-d H:i:s'),
	'TimeStamp' => new TimeStampType(),
];

$specSrc = new PhpFilesSpecSource('\\', __DIR__.'/spec');
$writer = new Psr0ClassWriter(__DIR__.'/gen');
$gen = new DTOGenerator($specSrc, $writer, $predefinedTypes, '7.1');

$gen->generate();
