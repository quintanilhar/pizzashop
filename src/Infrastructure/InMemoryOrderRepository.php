<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Infrastructure;

use Quintanilhar\PhpExtension\Uuid\Uuid;
use Quintanilhar\PizzaShop\Component\Order\Domain\Order;
use Quintanilhar\PizzaShop\Component\Order\Domain\OrderId;
use Quintanilhar\PizzaShop\Component\Order\Domain\OrderRepository;

class InMemoryOrderRepository implements OrderRepository
{
    /** @var array */
    private $orders = [];

    public function nextIdentity(): OrderId
    {
        return new OrderId((string) Uuid::generate());
    }

    public function save(Order $order): void
    {
        $this->orders[$order->orderId()->__toString()] = $order;
    }
}
