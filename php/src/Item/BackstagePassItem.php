<?php

declare(strict_types=1);

namespace GildedRose\Item;

use GildedRose\Item;
use InvalidArgumentException;

class BackstagePassItem extends Item
{
    public function __construct(
        string $name, 
        int $sellIn, 
        int $quality
    ) {
        if ($name !== 'Backstage passes to a TAFKAL80ETC concert') {
            throw new InvalidArgumentException('Name is invalid.');
        }
        parent::__construct($name, $sellIn, $quality);
    }

    public function update(): void
    {
        $this->increaseQuality();
        if ($this->sellIn < 11) {
            $this->increaseQuality();
        }
        if ($this->sellIn < 6) {
            $this->increaseQuality();
        }

        $this->sellIn -= 1;
        if ($this->sellIn < 0) {
            $this->quality = 0;
            return;
        }
    }
}
