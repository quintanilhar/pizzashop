<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Component\Cooking\Domain;

interface PizzaRepository
{
    public function nextIdentity(): PizzaId;

    public function pizzaOfId(string $pizzaId): ?Pizza;

    public function save(Pizza $pizza): void;
}
