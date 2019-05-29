<?php

namespace Quintanilhar\PizzaShop\Test\Unit\Component\Cooking\Domain;

use Quintanilhar\PizzaShop\Component\Cooking\Domain\Pizza;
use Quintanilhar\PizzaShop\Component\Cooking\Domain\PizzaId;

trait PizzaForTestProvider
{
    private function pizzaForTest(): Pizza
    {
        return new Pizza(
            new PizzaId('c72a59b2-c3ce-41a4-97de-cfe20ab13a8b'),
            ['mozzarella', 'pepperoni']
        );
    }

    private function createPizza(string $name, array $toppings): Pizza
    {
        return new Pizza(
            new PizzaId('c72a59b2-c3ce-41a4-97de-cfe20ab13a8b'),
            $toppings
        );
    }
}
