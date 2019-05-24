<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Domain;

class Pizza
{
    private $toppings;

    public function __construct(array $toppings)
    {
        $this->toppings = $toppings;
    }

    public function toppings(): array
    {
        return $this->toppings;
    }
}
