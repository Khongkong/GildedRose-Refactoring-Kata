<?php

declare(strict_types=1);

namespace GildedRose;

class Item
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

    public function increaseQuality(): void
    {
        if ($this->quality >= 50) {
            return;
        }
        $this->quality += 1;
    }

    public function decreaseQuality(): void
    {
        if ($this->quality <= 0) {
            return;
        }
        $this->quality -= 1;
    }
}
