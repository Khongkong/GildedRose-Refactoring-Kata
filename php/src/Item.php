<?php

declare(strict_types=1);

namespace GildedRose;

final class Item
{
    public function __construct(
        public string $name, 
        public int $sellIn, 
        public int $quality
    ) {
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }
}
