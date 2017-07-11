--TEST--
Decimal128: [basx307] Engineering notation tests
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('180000001364000A00000000000000000000000000523000');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "1.0E+10"}}';
$degenerateExtJson = '{"d" : {"$numberDecimal" : "10e9"}}';

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
180000001364000a00000000000000000000000000523000
{"d":{"$numberDecimal":"1.0E+10"}}
180000001364000a00000000000000000000000000523000
180000001364000a00000000000000000000000000523000
===DONE===