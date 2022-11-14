<?php

namespace Ben\PhpTraitsTest;

use Ben\PhpTraitsTest\Reflection\ReflectionHelper;

class GDPRAwareModulesRegister {
    const MODULE_CLASS_NAME = 'Ben\PhpTraitsTest\Modules\Module';
    const GDPR_AWARE_TRAIT_NAME = 'Ben\PhpTraitsTest\Traits\GDPRAwareTrait';

    protected $register = [];

    public function __construct() {
        $this->register = [];
        $allClasses = self::getAllClasses();
        $this->register = self::filterModuleClasses($allClasses);

        $adapters = self::getGDPRAdapters($allClasses);
        foreach ($adapters as $adapter) {
            $instance = $adapter->newInstance();
            $this->set($instance->getReferencedModule(), $instance);
        }
    }

    public function get($key = null) {
        if ($key === null) {
            return $this->register;
        }

        if (!isset($this->register[$key])) {
            return false;
        }

        return $this->register[$key];
    }

    private function set($key, $value) {
        $this->register[$key] = $value;
    }

    private function getAllClasses() {
        return get_declared_classes();
    }

    private function filterModuleClasses(array $classNames) : array {
        $modules = [];

        $moduleClass = ReflectionHelper::getReflectionClass(self::MODULE_CLASS_NAME);

        foreach ($classNames as $className) {
            $clazz = ReflectionHelper::getReflectionClass($className);
            if ($clazz->isSubclassOf($moduleClass)) {
                $modules[$clazz->getName()] = true;
            }
        }
        
        return $modules;
    }
    
    private function getGDPRAdapters(array $classNames) : array {
        $adapters = [];
        foreach ($classNames as $className) {
            $clazz = ReflectionHelper::getReflectionClass($className);
            $traits = ReflectionHelper::classUsesDeep($className);

            if (is_array($traits) &&
                !empty($traits) && 
                reset($traits) === self::GDPR_AWARE_TRAIT_NAME) {
                $adapters[] = $clazz;
            }
            
        }
    
        return $adapters;
    }

}
