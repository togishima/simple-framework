<?php

namespace Tests\UnitTests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use stdClass;
use Tests\Samples\Sample;
use Tests\Samples\SampleCollection;

class CollectionTest extends TestCase
{
    public function setUp(): void
    {
    }

    /**
     * @test
     */
    public function acceptsSampleInstance()
    {
        $items = [new Sample(), new Sample()];
        $collection = new SampleCollection($items);

        $this->assertTrue($collection instanceof SampleCollection);
    }

    /**
     * @test
     */
    public function doesNotAcceptNonSampleInstance()
    {
        $this->expectException(InvalidArgumentException::class);

        $items = [new stdClass()];
        new SampleCollection($items);
    }

    /**
     * @test
     */
    public function doesNotAcceptMoreThanFourItems()
    {
        $this->expectException(InvalidArgumentException::class);
        $items = [new Sample(), new Sample(), new Sample(), new Sample(), new Sample()];
        new SampleCollection($items);
    }

    /**
     * @test
     */
    public function doesNotAcceptEmptyArray()
    {
        $this->expectException(InvalidArgumentException::class);
        $items = [];
        new SampleCollection($items);
    }
}