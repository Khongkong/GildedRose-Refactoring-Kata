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
                $this->increaseQuality($item);
            } elseif ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                $this->increaseQuality($item);
                if ($item->sellIn < 11) {
                    $this->increaseQuality($item);
                }
                if ($item->sellIn < 6) {
                    $this->increaseQuality($item);
                }
            } else {
                $this->decreaseQuality($item);
            }
            $item->sellIn -= 1;

            if ($item->sellIn >= 0) {
                continue;
            }
            if ($item->name === 'Aged Brie') {
                $this->increaseQuality($item);
            } elseif ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                $item->quality = 0;
            } else {
                $this->decreaseQuality($item);
            }
        }
    }

    private function increaseQuality(Item $item): void
    {
        if ($item->quality >= 50) {
            return;
        }
        $item->quality += 1;
    }

    private function decreaseQuality(Item $item): void
    {
        if ($item->quality <= 0) {
            return;
        }
        $item->quality -= 1;
    }
}
