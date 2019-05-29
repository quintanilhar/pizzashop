<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Test\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use Quintanilhar\PizzaShop\Component\Cooking\Domain\Recipe;
use Quintanilhar\PizzaShop\Infrastructure\InMemoryPizzaRepository;
use Quintanilhar\PizzaShop\Test\Behat\Service\SharedStorage;
use Quintanilhar\PizzaShop\Test\Unit\Component\Cooking\Domain\PizzaForTestProvider;

class PizzaContext implements Context
{
    use PizzaForTestProvider;

    /**
     * @Given the shop has a :pizzaName pizza with the toppings :toppings in the menu
     * @Given the shop has a :pizzaName pizza in the menu
     */
    public function theShopHasAPizzaWithTheToppingsInTheMenu($pizzaName, $toppings = 'mozzarella')
    {
        $pizza = $this->createPizza($pizzaName, explode(',', $toppings));

        SharedStorage::instance()->set('pizza', $pizza);

        SharedStorage::instance()->set(
            'pizzaRepository',
            new InMemoryPizzaRepository([$pizza->pizzaId()->__toString() => $pizza])
        );
    }
}
