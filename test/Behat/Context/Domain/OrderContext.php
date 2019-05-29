<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Test\Behat\Context\Domain;

use Behat\Behat\Context\Context;
use Quintanilhar\PizzaShop\Component\Cooking\Domain\Pizza;
use Quintanilhar\PizzaShop\Component\Order\Application\OrderService;
use Quintanilhar\PizzaShop\Component\Order\Domain\Order;
use Quintanilhar\PizzaShop\Infrastructure\InMemoryOrderRepository;
use Quintanilhar\PizzaShop\Test\Behat\Service\SharedStorage;
use Webmozart\Assert\Assert;

class OrderContext implements Context
{
    /**
     * @When I order a :pizza pizza
     */
    public function iOrderAPizza($pizza)
    {
        $storage = SharedStorage::instance();

        $orderService = new OrderService(
            new InMemoryOrderRepository(),
            $storage->get('pizzaRepository')
        );

        /** @var Pizza $requestedPizza */
        $requestedPizza = $storage->get('pizza');

        $order = $orderService->createOrder($requestedPizza->pizzaId()->__toString());

        SharedStorage::instance()->set('order', $order);
    }

    /**
     * @Then I should have a :pizza pizza in my order
     */
    public function iShouldHaveAPizzaInMyOrder($pizza)
    {
        /** @var Order $order */
        $order = SharedStorage::instance()->get('order');

        Assert::eq($pizza, $order->item()->name());
    }

    /**
     * @Then the total should be :total
     */
    public function theTotalShouldBe($total)
    {
        $order = SharedStorage::instance()->get('order');

        $total = (float) str_replace('$', '', $total);

        Assert::same($total, $order->total());
    }

    /**
     * @Then a request should be set to the Pizzaiolo to cook the pizza
     */
    public function aRequestShouldBeSetToThePizzaioloToCookThePizza()
    {
        // Event listener
    }
}
