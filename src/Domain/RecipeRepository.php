<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Domain;

interface PizzaRepository
{
    public function findRecipeOfPizzaId(string $pizzaId): Recipe;
}
