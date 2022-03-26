<?php

declare(strict_types=1);

namespace GildedRose\Item;

use GildedRose\Item;
use InvalidArgumentException;

class SulfurasItem extends Item
{
    public function __construct(
        string $name, 
        int $sellIn, 
        int $quality
    ) {
        if ($name !== 'Sulfuras, Hand of Ragnaros') {
            throw new InvalidArgumentException('Name is invalid.');
        }
        parent::__construct($name, $sellIn, $quality);
    }

    public function update(): void
    {
        // do nothing
    }
}
