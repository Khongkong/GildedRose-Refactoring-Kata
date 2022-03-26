<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use GildedRose\GildedRose;
use GildedRose\Item;
use GildedRose\Item\AgedBrieItem;
use GildedRose\Item\BackstagePassItem;
use GildedRose\Item\NormalItem;
use GildedRose\Item\SulfurasItem;

echo 'OMGHAI!' . PHP_EOL;

$items = [
    new NormalItem('+5 Dexterity Vest', 10, 20),
    new AgedBrieItem('Aged Brie', 2, 0),
    new NormalItem('Elixir of the Mongoose', 5, 7),
    new SulfurasItem('Sulfuras, Hand of Ragnaros', 0, 80),
    new SulfurasItem('Sulfuras, Hand of Ragnaros', -1, 80),
    new BackstagePassItem('Backstage passes to a TAFKAL80ETC concert', 15, 20),
    new BackstagePassItem('Backstage passes to a TAFKAL80ETC concert', 10, 49),
    new BackstagePassItem('Backstage passes to a TAFKAL80ETC concert', 5, 49),
    // this conjured item does not work properly yet
    new NormalItem('Conjured Mana Cake', 3, 6),
];

$app = new GildedRose($items);

$days = 2;
if (count($argv) > 1) {
    $days = (int) $argv[1];
}

for ($i = 0; $i < $days; $i++) {
    echo "-------- day ${i} --------" . PHP_EOL;
    echo 'name, sellIn, quality' . PHP_EOL;
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
    echo PHP_EOL;
    $app->updateQuality();
}
