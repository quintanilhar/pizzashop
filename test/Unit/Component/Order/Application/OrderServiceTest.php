<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Test\Unit\Component\Order\Application;

use PHPUnit\Framework\TestCase;
use Quintanilhar\PizzaShop\Component\Order\Application\OrderService;
use Quintanilhar\PizzaShop\Infrastructure\InMemoryOrderRepository;
use Quintanilhar\PizzaShop\Infrastructure\InMemoryPizzaRepository;
use Quintanilhar\PizzaShop\Test\Unit\Component\Cooking\Domain\PizzaForTestProvider;

class OrderServiceTest extends TestCase
{
    use PizzaForTestProvider;

    /**
     * @test
     */
    public function it_should_create_order_when_asked_for_creating_anOrder()
    {
        $pizza = $this->pizzaForTest();

        $pizzaRepository = new InMemoryPizzaRepository();

        $pizzaRepository->save($pizza);

        $orderService = new OrderService(
            new InMemoryOrderRepository(),
            $pizzaRepository
        );

        $order = $orderService->createOrder($pizza->pizzaId()->__toString());

        $this->assertSame(10.0, $order->total());
        $this->assertSame($pizza->pizzaId(), $order->item()->id());
    }
}
