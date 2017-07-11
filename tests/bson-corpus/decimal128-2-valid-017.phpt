--TEST--
Decimal128: [decq125] Nmax and similar
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('18000000136400F2AF967ED05C82DE3297FF6FDE3CFEDF00');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "-1.234567890123456789012345678901234E+6144"}}';

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
18000000136400f2af967ed05c82de3297ff6fde3cfedf00
{"d":{"$numberDecimal":"-1.234567890123456789012345678901234E+6144"}}
18000000136400f2af967ed05c82de3297ff6fde3cfedf00
===DONE===