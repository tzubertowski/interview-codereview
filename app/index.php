<?php

$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->addPsr4('Lenstore\\classes\\', __DIR__ . '/classes');

use Lenstore\classes\A;

$filename = $argv[1];

$class = new A();
$class->fcnA($filename);

var_dump("finished");