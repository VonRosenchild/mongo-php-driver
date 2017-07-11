--TEST--
Regular Expression type: empty regex with no options
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('0A0000000B6100000000');
$canonicalExtJson = '{"a" : {"$regularExpression" : { "pattern": "", "options" : ""}}}';

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
0a0000000b6100000000
{"a":{"$regularExpression":{"pattern":"","options":""}}}
0a0000000b6100000000
===DONE===