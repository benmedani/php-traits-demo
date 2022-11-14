<?php

namespace Ben\PhpTraitsTest\Traits;

trait GDPRAwareTrait {
    protected $translationString = "";
    protected bool $isConsentEnabled = false;

    public function getTranslationString() : string {
        return $this->translationString;
    }

    public function setTranslationString(string $translationString) : void {
        $this->translationString = $translationString;
    }

    public function enableConsent() : void {
        $this->isConsentEnabled = true;
    }

    public function disableConsent() : void {
        $this->isConsentEnabled = false;
    }
}
