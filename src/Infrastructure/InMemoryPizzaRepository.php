<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Infrastructure;

use Quintanilhar\PhpExtension\Uuid\Uuid;
use Quintanilhar\PizzaShop\Component\Cooking\Domain\Pizza;
use Quintanilhar\PizzaShop\Component\Cooking\Domain\PizzaId;
use Quintanilhar\PizzaShop\Component\Cooking\Domain\PizzaRepository;

class InMemoryPizzaRepository implements PizzaRepository
{
    /**
     * @var Pizza[]
     */
    private $pizzas = [];

    public function nextIdentity(): PizzaId
    {
        return new PizzaId((string) Uuid::generate());
    }

    public function pizzaOfId(string $pizzaId): ?Pizza
    {
        return $this->pizzas[$pizzaId] ?? null;
    }

    public function save(Pizza $pizza): void
    {
        $this->pizzas[$pizza->pizzaId()->__toString()] = $pizza;
    }
}
