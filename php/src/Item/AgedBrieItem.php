<?php

declare(strict_types=1);

namespace GildedRose\Item;

use GildedRose\Item;
use InvalidArgumentException;

class AgedBrieItem extends Item
{
    public function __construct(
        string $name, 
        int $sellIn, 
        int $quality
    ) {
        if ($name !== 'Aged Brie') {
            throw new InvalidArgumentException('Name is invalid.');
        }
        parent::__construct($name, $sellIn, $quality);
    }

    public function update(): void
    {
        $this->increaseQuality();

        $this->sellIn -= 1;
        if ($this->sellIn < 0) {
            $this->increaseQuality();
        }
    }
}