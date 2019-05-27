<?php

namespace Quintanilhar\PizzaShop\Domain;

interface CookPizza
{
    public function cookPizza(string $pizzaId): Pizza;
}
