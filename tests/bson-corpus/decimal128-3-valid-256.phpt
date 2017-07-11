--TEST--
Decimal128: [basx200] Numbers with E
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('18000000136400F104000000000000000000000000423000');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "1.265E+4"}}';
$degenerateExtJson = '{"d" : {"$numberDecimal" : "12.65E+3"}}';

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
18000000136400f104000000000000000000000000423000
{"d":{"$numberDecimal":"1.265E+4"}}
18000000136400f104000000000000000000000000423000
18000000136400f104000000000000000000000000423000
===DONE===