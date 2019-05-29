<?php

namespace Quintanilhar\PizzaShop\Component\Order\Domain;

interface OrderPizza
{
    public function createOrder(string $pizzaId): Order;
}
