<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Domain;

class CookingService implements CookPizza
{
    public function cookPizza(string $flavourId): Pizza
    {
        return new Pizza(['mozzarella', 'pepperoni']);
    }
}
