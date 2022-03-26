<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name === 'Aged Brie' || $item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                }
                if ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($item->sellIn < 11) {
                        if ($item->quality < 50) {
                            $item->quality = $item->quality + 1;
                        }
                    }
                    if ($item->sellIn < 6) {
                        if ($item->quality < 50) {
                            $item->quality = $item->quality + 1;
                        }
                    }
                }
            } else {
                if (
                    $item->quality > 0
                    && $item->name !== 'Sulfuras, Hand of Ragnaros'
                ) {
                    $item->quality = $item->quality - 1;
                }
            }

            if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
                $item->sellIn = $item->sellIn - 1;
            }

            if ($item->sellIn >= 0) {
                continue;
            }
            if ($item->name === 'Aged Brie') {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                }
            } elseif ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                $item->quality = 0;
            } else {
                if (
                    $item->quality > 0
                    && $item->name !== 'Sulfuras, Hand of Ragnaros'
                ) {
                    $item->quality = $item->quality - 1;
                }
            }
        }
    }
}
