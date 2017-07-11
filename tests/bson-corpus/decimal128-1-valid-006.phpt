--TEST--
Decimal128: Special - NaN with a payload
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('180000001364001200000000000000000000000000007E00');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "NaN"}}';

// Canonical BSON -> Native -> Canonical BSON 
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> Canonical extJSON 
echo json_canonicalize(toExtendedJSON($canonicalBson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
180000001364001200000000000000000000000000007e00
{"d":{"$numberDecimal":"NaN"}}
===DONE===