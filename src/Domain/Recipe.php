<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Domain;

final class Recipe
{
    /**
     * @var string
     */
    private $recipeId;

    /**
     * @var string[]
     */
    private $toppings;

    public function __construct(string $recipeId, array $toppings)
    {
        $this->recipeId = $recipeId;
        $this->toppings = $toppings;
    }

    /**
     * @return string
     */
    public function recipeId(): string
    {
        return $this->recipeId;
    }

    /**
     * @return string[]
     */
    public function toppings(): array
    {
        return $this->toppings;
    }
}
