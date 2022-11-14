<?php

namespace Ben\PhpTraitsTest;

use Ben\PhpTraitsTest\GDPRAwareModulesRegister;

include dirname(__FILE__) . '/../vendor/autoload.php';
include 'include.php';

$register = new GDPRAwareModulesRegister();
$modules = $register->get();

var_dump($modules);

