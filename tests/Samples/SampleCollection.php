<?php

namespace Tests\Samples;

use Framework\Collection\Collection;

class SampleCollection extends Collection
{
    /**
     * @inheritDoc
     */
    protected function collectionRules(): array
    {
        return ['sample_rule' => new SampleCollectionRule()];
    }
}