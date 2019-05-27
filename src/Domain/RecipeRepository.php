<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Domain;

interface RecipeRepository
{
    public function recipeOfPizzaId(string $pizzaId): ?Recipe;
}
