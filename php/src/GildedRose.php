<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ){
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name === 'Sulfuras, Hand of Ragnaros') {
                continue;
            }
            if ($item->name === 'Aged Brie') {
                $item->increaseQuality();
            } elseif ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                $item->increaseQuality();
                if ($item->sellIn < 11) {
                    $item->increaseQuality();
                }
                if ($item->sellIn < 6) {
                    $item->increaseQuality();
                }
            } else {
                $item->decreaseQuality();
            }
            $item->sellIn -= 1;

            if ($item->sellIn >= 0) {
                continue;
            }
            if ($item->name === 'Aged Brie') {
                $item->increaseQuality();
            } elseif ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                $item->quality = 0;
            } else {
                $item->decreaseQuality();
            }
        }
    }
}
