<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Infrastructure;

use Quintanilhar\PizzaShop\Domain\Recipe;
use Quintanilhar\PizzaShop\Domain\RecipeRepository;

class InMemoryRecipeRepository implements RecipeRepository
{
    /**
     * @var Recipe[]
     */
    private $recipes;

    public function __construct(array $recipes)
    {
        $this->recipes = $recipes;
    }

    public function recipeOfPizzaId(string $pizzaId): ?Recipe
    {
        return $this->recipes[$pizzaId] ?? null;
    }
}
