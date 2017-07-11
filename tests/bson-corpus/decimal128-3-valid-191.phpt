--TEST--
Decimal128: [basx387] Engineering notation tests
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('1800000013640007000000000000000000000000003E3000');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "0.7"}}';
$degenerateExtJson = '{"d" : {"$numberDecimal" : "7E-1"}}';

// Canonical BSON -> Native -> Canonical BSON 
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> Canonical extJSON 
echo json_canonicalize(toExtendedJSON($canonicalBson)), "\n";

// Canonical extJSON -> Canonical BSON 
echo bin2hex(fromJSON($canonicalExtJson)), "\n";

// Degenerate extJSON -> Canonical BSON 
echo bin2hex(fromJSON($degenerateExtJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
1800000013640007000000000000000000000000003e3000
{"d":{"$numberDecimal":"0.7"}}
1800000013640007000000000000000000000000003e3000
1800000013640007000000000000000000000000003e3000
===DONE===