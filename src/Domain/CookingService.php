<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Domain;

class CookingService implements CookPizza
{
    /**
     * @var RecipeRepository
     */
    private $recipeRepository;

    public function __construct(RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function cookPizza(string $pizzaId): Pizza
    {
        $recipe = $this->recipeRepository->recipeOfPizzaId($pizzaId);

        if (null === $recipe) {
            throw new UnknownPizza($pizzaId);
        }

        return Pizza::fromRecipe($recipe);
    }
}
