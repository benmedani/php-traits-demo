<?php

namespace Ben\PhpTraitsTest\Adapters;

abstract class AbstractGDPRAdapter {
    const TRANSLATION_STRING = 'GDPR Text';
    protected string $referencedModule;
    
    public function getReferencedModule() {
        return $this->referencedModule;
    }

    protected function setReferencedModule($module) : void {
        $this->referencedModule = $module;
    }

}
