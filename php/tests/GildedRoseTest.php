<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use GildedRose\Item\AgedBrieItem;
use GildedRose\Item\BackstagePassItem;
use GildedRose\Item\NormalItem;
use GildedRose\Item\SulfurasItem;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    /**
     * @test
     */
    public function itemNameIsCorrect(): void
    {
        $items = [new NormalItem('name', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('name', $items[0]->name);
    }

    /**
     * @test
     */
    public function sulfurasCouldNotBeSold(): void
    {
        $items = [new SulfurasItem('Sulfuras, Hand of Ragnaros', 10, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(10, $items[0]->sellIn);
    }

    /**
     * @test
     */
    public function sulfurasCouldNotDecreaseQuality(): void
    {
        $items = [new SulfurasItem('Sulfuras, Hand of Ragnaros', 10, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(0, $items[0]->quality);
    }

    /**
     * @test
     */
    public function qualityCouldNotBeMoreThanFifty(): void
    {
        $items = [new AgedBrieItem('Aged Brie', 10, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(50, $items[0]->quality);
    }

    /**
     * @test
     */
    public function itemWithDatePassedQualityDecreasedByTwice(): void
    {
        $items = [new NormalItem('Foo', -1, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(48, $items[0]->quality);
    }

    /**
     * @test
     */
    public function agedBrieIncreasesQualityWhenItGetsOlder(): void
    {
        $items = [new AgedBrieItem('Aged Brie', 1, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(41, $items[0]->quality);
    }

    /**
     * @test
     */
    public function agedBrieIncreasesTwoQualitiesWhenDateIsPassed(): void
    {
        $items = [new AgedBrieItem('Aged Brie', -1, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(42, $items[0]->quality);
    }

    /**
     * @test
     */
    public function backstagePassesIncreaseTwoQualitiesWhenSellInLessThanEleven(): void
    {
        $items = [new BackstagePassItem('Backstage passes to a TAFKAL80ETC concert', 10, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(42, $items[0]->quality);
    }

    /**
     * @test
     */
    public function backstagePassesIncreaseThreeQualitiesWhenSellInLessThanSix(): void
    {
        $items = [new BackstagePassItem('Backstage passes to a TAFKAL80ETC concert', 5, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(43, $items[0]->quality);
    }

    /**
     * @test
     */
    public function backstagePassesDropQualityToZeroAfterConcert(): void
    {
        $items = [new BackstagePassItem('Backstage passes to a TAFKAL80ETC concert', 0, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(0, $items[0]->quality);
    }
    
    /**
     * @test
     */
    public function backstagePassesIncreaseOneQualityWhenSellInIsMoreThanTen(): void
    {
        $items = [new BackstagePassItem('Backstage passes to a TAFKAL80ETC concert', 11, 40)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(41, $items[0]->quality);
    }

    /**
     * @todo To be implemented
     */
    public function conjuredItemWithQualityDecreasedByTwice(): void
    {
        $items = [new NormalItem('Conjured Mana Cake', 1, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame(48, $items[0]->quality);
    }
}
