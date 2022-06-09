<?php

namespace Tests\Samples;

use Basic\Collection\Collection;
use InvalidArgumentException;

class SampleCollection extends Collection
{
    /**
     * @inheritDoc
     */
    protected function collectionRules(): array
    {
        return ['sample_rule' => new SampleCollectionRule()];
    }

    /**
     * append a sample item
     *
     * @param Sample $item
     * @return void
     */
    public function append(Sample $item): void 
    {
        if (SampleCollectionRule::isMax(count($this->items))) {
            throw new InvalidArgumentException("Maximum quantity reached, cannnot Append");
        } else {
            $this->items[] = $item;
        }
    }
}