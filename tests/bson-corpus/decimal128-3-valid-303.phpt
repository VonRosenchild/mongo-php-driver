--TEST--
Decimal128: [basx058] strings without E cannot generate E in result
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('180000001364006AF90B7C50000000000000000000343000');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "345678.543210"}}';

// Canonical BSON -> Native -> Canonical BSON 
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> Canonical extJSON 
echo json_canonicalize(toExtendedJSON($canonicalBson)), "\n";

// Canonical extJSON -> Canonical BSON 
echo bin2hex(fromJSON($canonicalExtJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
180000001364006af90b7c50000000000000000000343000
{"d":{"$numberDecimal":"345678.543210"}}
180000001364006af90b7c50000000000000000000343000
===DONE===