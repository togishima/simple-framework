<?php

namespace Tests\Samples;

class SampleCollectionRule
{
    private const MIN = 1;
    private const MAX = 4;

    public function __invoke(array $items): bool
    {
        if ($this->isNotValidClass($items)) {
            return false;
        }
        if ($this->isNotEnough($items)) {
            return false;
        }
        if ($this->isTooMany($items)) {
            return false;
        }
        return true;
    }

    private function isNotValidClass(array $items)
    {
        foreach($items as $item) {
            if ($item instanceof Sample) {
                continue;
            }
            return true;
        }
        return false;
    }

    private function isNotEnough(array $items)
    {
        return count($items) < self::MIN;
    }

    private function isTooMany(array $items)
    {
        return count($items) > self::MAX;
    }


}