<?php

namespace Ben\PhpTraitsTest\Reflection;

class ReflectionHelper {

    static function classUsesDeep($class, $autoload = true) {
        $traits = [];
        do {
            $traits = array_merge(class_uses($class, $autoload), $traits);
        } while($class = get_parent_class($class));

        foreach ($traits as $trait => $same) {
            $traits = array_merge(class_uses($trait, $autoload), $traits);
        }

        return array_unique($traits);
    }

    static function getClassInstance($className) {
        return (new \ReflectionClass($className))->newInstance();
    }

    static function getReflectionClass($className) {
        return new \ReflectionClass($className);
    }

    static private function _getTraitNames($class, $traitNames = []) {

        if ($class->getParentClass() != false) {
            ReflectionHelper::getTraitNames($class->getParentClass(), $traitNames);
        } else {
            $traitNames = array_merge($traitNames, $class->getTraitNames());
        }

        return $traitNames;
    }

    static function getTraitNames($class) {
        if (gettype($class) == "string") {
            $class = self::getReflectionClass($class);
        }

        if (gettype($class) == "object") {
            if (!($class instanceof \ReflectionClass)) {
                $class = new \ReflectionClass($class);
            }
            return self::_getTraitNames($class);
        }
    }

}
