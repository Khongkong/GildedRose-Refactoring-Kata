<?php

declare(strict_types=1);

namespace GildedRose\Item;

use GildedRose\Item;
use InvalidArgumentException;

class ConjuredItem extends Item
{
    public function __construct(
        string $name, 
        int $sellIn, 
        int $quality
    ) {
        if ($name !== 'Conjured Mana Cake') {
            throw new InvalidArgumentException('Name is invalid.');
        }
        parent::__construct($name, $sellIn, $quality);
    }

    public function update(): void
    {
        $this->sellIn -= 1;
        for ($i = 0; $i < 2; $i++) {
            $this->decreaseQuality();
            if ($this->sellIn < 0) {
                $this->decreaseQuality();
            }
        }
    }
}