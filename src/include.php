<?php

namespace Ben\PhpTraitsTest;

use Ben\PhpTraitsTest\Adapters\CheckoutModuleGDPRAdapter;
use Ben\PhpTraitsTest\Modules\CheckoutModule;
use Ben\PhpTraitsTest\Modules\GiftcardModule;
use Ben\PhpTraitsTest\Reflection\ReflectionHelper;

$dummy = [];

$dummy[] = new CheckoutModuleGDPRAdapter();
$dummy[] = new CheckoutModule();
$dummy[] = new GiftcardModule();
$dummy[] = new ReflectionHelper();
$dummy[] = new GDPRAwareModulesRegister();


// var_dump((new CheckoutModuleGDPRAdapter())->getReferencedModule());
