<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Component\Cooking\Application;

use Quintanilhar\PizzaShop\Component\Cooking\Domain\CookPizza;
use Quintanilhar\PizzaShop\Component\Cooking\Domain\Pizza;
use Quintanilhar\PizzaShop\Component\Cooking\Domain\PizzaRepository;
use Quintanilhar\PizzaShop\Component\Cooking\Domain\UnknownPizza;

class CookingService implements CookPizza
{
    /**
     * @var PizzaRepository
     */
    private $pizzaRepository;

    public function __construct(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
    }

    public function cookPizza(string $pizzaId): Pizza
    {
        $pizza = $this->pizzaRepository->pizzaOfId($pizzaId);

        if (null === $pizza) {
            throw new UnknownPizza($pizzaId);
        }

        return $pizza;
    }
}
