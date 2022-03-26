<?php

declare(strict_types=1);

namespace GildedRose;

abstract class Item
{
    public function __construct(
        protected string $name, 
        protected int $sellIn, 
        protected int $quality
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

    public function getName(): string
    {
        return $this->name;
    }

    public function getSellIn(): int
    {
        return $this->sellIn;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    abstract public function update(): void;
}
