<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Component\Cooking\Domain;

use Webmozart\Assert\Assert;

class Pizza
{
    /** @var PizzaId */
    private $pizzaId;

    /** @var array */
    private $toppings;

    public function __construct(PizzaId $pizzaId, array $toppings)
    {
        $this->toppings = $toppings;

        $this->setPizzaId($pizzaId);
    }

    public function pizzaId(): PizzaId
    {
        return $this->pizzaId;
    }

    public function toppings(): array
    {
        return $this->toppings;
    }

    private function setPizzaId(PizzaId $pizzaId)
    {
        Assert::notNull($pizzaId, 'The pizzaId must be provided.');

        $this->pizzaId = $pizzaId;
    }
}
