--TEST--
Decimal128: Regular - Adjusted Exponent Limit
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('18000000136400F2AF967ED05C82DE3297FF6FDE3CF22F00');
$canonicalExtJson = '{"d": { "$numberDecimal": "0.000001234567890123456789012345678901234" }}';

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
18000000136400f2af967ed05c82de3297ff6fde3cf22f00
{"d":{"$numberDecimal":"0.000001234567890123456789012345678901234"}}
18000000136400f2af967ed05c82de3297ff6fde3cf22f00
===DONE===