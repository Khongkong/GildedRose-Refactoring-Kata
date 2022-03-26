<?php

declare(strict_types=1);

namespace GildedRose\Item;

use GildedRose\Item;

class NormalItem extends Item
{
    public function update(): void
    {
        $this->decreaseQuality();

        $this->sellIn -= 1;
        if ($this->sellIn < 0) {
            $this->decreaseQuality();
        }
    }
}
