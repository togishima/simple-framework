<?php

namespace Basic\Collection;

use ArrayIterator;
use InvalidArgumentException;
use IteratorAggregate;
use Traversable;

/**
 * Foundation class for first class collection
 * @template T
 */
abstract class Collection implements IteratorAggregate
{
    /**
     * @var array<T>
     */
    private readonly array $items;

    /**
     * @param array<T> $items
     */
    public function __construct(array $items)
    {
        $this->items = $this->validate($items);
    }

    /**
     * Validate items before setting it to instance variable
     *
     * @param array<T> $items
     * @return array<T> $items
     */
    private function validate(array $items)
    {
        $rules = $this->collectionRules();
        // if no set rules, return all items as validated
        if (count($rules) <= 0) {
            return $items;
        }
        // apply rules
        foreach($rules as $key => $rule) {
            if (!$rule($items)) {
                throw new InvalidArgumentException("Rule $key violated");
            }
        }
        return $items;
    }

    /**
     * returns sets of rules to be applied to values given
     *
     * @return array<string,Callable>
     */
    abstract protected function collectionRules(): array;

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }
}