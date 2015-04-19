<?php

$runner->addTestsFromDirectory(__DIR__.'/tests/units');

$script->noCodeCoverageForNamespaces('mageekguy', 'Symfony');
$script->bootstrapFile(__DIR__.DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'bootstrap.php');