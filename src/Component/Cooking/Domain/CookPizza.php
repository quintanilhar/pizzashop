<?php

namespace Quintanilhar\PizzaShop\Component\Cooking\Domain;

interface CookPizza
{
    public function cookPizza(string $pizzaId): Pizza;
}
