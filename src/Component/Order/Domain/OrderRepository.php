<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Component\Order\Domain;

interface OrderRepository
{
    public function nextIdentity(): OrderId;

    public function save(Order $order): void;
}
