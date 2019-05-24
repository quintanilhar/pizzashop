<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Test\Behat\Context\Domain;

use Behat\Behat\Context\Context;

class CookingContext implements Context
{
    /**
     * @Given the shop has a :flavour pizza with the toppings :toppings in the menu
     */
    public function theShopHasAPizzaWithTheToppingsInTheMenu($flavour, $toppings)
    {
        throw new PendingException();
    }

    /**
     * @When I prepare a :flavour pizza
     */
    public function iPrepareAPizza($flavour)
    {
        throw new PendingException();
    }

    /**
     * @Then it should be prepared following the :flavour recipe
     */
    public function itShouldBePreparedFollowingTheRecipe($flavour)
    {
        throw new PendingException();
    }
}
