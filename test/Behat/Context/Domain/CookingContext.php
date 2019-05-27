<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Test\Behat\Context\Domain;

use Behat\Behat\Context\Context;
use Quintanilhar\PizzaShop\Domain\CookingService;
use Quintanilhar\PizzaShop\Domain\Pizza;
use Quintanilhar\PizzaShop\Domain\Recipe;
use Quintanilhar\PizzaShop\Domain\RecipeRepository;
use Quintanilhar\PizzaShop\Infrastructure\InMemoryRecipeRepository;
use Webmozart\Assert\Assert;

class CookingContext implements Context
{
    /**
     * @var RecipeRepository
     */
    private $recipeRepository;

    /**
     * @var Recipe
     */
    private $recipe;

    /**
     * @var Pizza
     */
    private $pizza;

    /**
     * @Given the shop has a :pizza pizza with the toppings :toppings in the menu
     */
    public function theShopHasAPizzaWithTheToppingsInTheMenu($pizza, $toppings)
    {
        $this->recipe = new Recipe(strtolower($pizza), explode(',', $toppings));

        $this->recipeRepository = new InMemoryRecipeRepository(
            [$this->recipe->recipeId() => $this->recipe]
        );
    }

    /**
     * @When I cook a :pizza pizza
     */
    public function iPrepareAPizza($pizza)
    {
        $cookingService = new CookingService($this->recipeRepository);

        $this->pizza = $cookingService->cookPizza(strtolower($pizza));
    }

    /**
     * @Then it should be prepared following the recipe
     */
    public function itShouldBePreparedFollowingTheRecipe()
    {
        Assert::eq($this->recipe->toppings(), $this->pizza->toppings());
    }
}
