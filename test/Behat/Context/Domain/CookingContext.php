<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Test\Behat\Context\Domain;

use Behat\Behat\Context\Context;
use Quintanilhar\PizzaShop\Component\Cooking\Application\CookingService;
use Quintanilhar\PizzaShop\Component\Cooking\Domain\Pizza;
use Quintanilhar\PizzaShop\Test\Behat\Service\SharedStorage;
use Webmozart\Assert\Assert;

class CookingContext implements Context
{
    /**
     * @When I cook it
     */
    public function iCookAPizza()
    {
        $storage = SharedStorage::instance();

        /** @var Pizza $requestedPizza */
        $requestedPizza = $storage->get('pizza');

        /** @var \Quintanilhar\PizzaShop\Component\Cooking\Domain\PizzaRepository $pizzaRepository */
        $pizzaRepository = $storage->get('pizzaRepository');

        $cookingService = new CookingService($pizzaRepository);

        $pizza = $cookingService->cookPizza($requestedPizza->pizzaId()->__toString());

        $storage->set('cookedPizza', $pizza);
    }

    /**
     * @Then it should be cooked following its recipe
     */
    public function itShouldBeCookedFollowingItsRecipe()
    {
        $storage = SharedStorage::instance();

        $requestedPizza = $storage->get('pizza');
        $cookedPizza = $storage->get('cookedPizza');

        Assert::eq($requestedPizza->toppings(), $cookedPizza->toppings());
    }
}
