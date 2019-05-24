<?php

namespace Quintanilhar\PizzaShop\Domain;

use PHPUnit\Framework\TestCase;

class CookingServiceTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_give_Pizza_when_asked_for_cooking_aPizza()
    {
        $cookingService = new CookingService();

        $pizza = $cookingService->cookPizza('pepperoni');

        $this->assertSame(['mozzarella', 'pepperoni'], $pizza->toppings());
    }
}
