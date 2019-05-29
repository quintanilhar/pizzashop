<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Component\Order\Application;

use Quintanilhar\PizzaShop\Component\Cooking\Domain\PizzaRepository;
use Quintanilhar\PizzaShop\Component\Order\Domain\Order;
use Quintanilhar\PizzaShop\Component\Order\Domain\OrderPizza;
use Quintanilhar\PizzaShop\Component\Order\Domain\OrderRepository;

class OrderService implements OrderPizza
{
    /** @var OrderRepository */
    private $orderRepository;

    /** @var PizzaRepository */
    private $pizzaRepository;

    public function __construct(
        OrderRepository $orderRepository,
        PizzaRepository $pizzaRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->pizzaRepository = $pizzaRepository;
    }

    public function createOrder(string $pizzaId): Order
    {
        $pizza = $this->pizzaRepository->pizzaOfId($pizzaId);

        $orderId = $this->orderRepository->nextIdentity();

        $order = new Order($orderId);

        $order->addItem(
            $pizza->pizzaId(),
            $pizza->name(),
            10
        );

        $this->orderRepository->save($order);

        return $order;
    }
}
