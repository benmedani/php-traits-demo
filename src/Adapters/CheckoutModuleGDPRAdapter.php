<?php

namespace Ben\PhpTraitsTest\Adapters;

use Ben\PhpTraitsTest\Modules\CheckoutModule;
use Ben\PhpTraitsTest\Traits\GDPRAwareTrait;

class CheckoutModuleGDPRAdapter extends AbstractGDPRAdapter{
    const TRANSLATION_STRING = 'Checkout Module GDPR Text';
    
    use GDPRAwareTrait;

    public function __construct()
    {
        $this->setTranslationString(self::TRANSLATION_STRING);
        $this->referencedModule = CheckoutModule::class;
    }
}
