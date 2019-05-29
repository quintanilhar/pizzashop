<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Component\Cooking\Domain;

use Webmozart\Assert\Assert;

class Pizza
{
    /** @var PizzaId */
    private $pizzaId;

    /** @var string */
    private $name;

    /** @var array */
    private $toppings;

    public function __construct(PizzaId $pizzaId, string $name, array $toppings)
    {
        $this->setPizzaId($pizzaId);
        $this->setName($name);
        $this->setToppings($toppings);
    }

    public function pizzaId(): PizzaId
    {
        return $this->pizzaId;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function toppings(): array
    {
        return $this->toppings;
    }

    private function setPizzaId(PizzaId $pizzaId): void
    {
        Assert::notNull($pizzaId, 'The pizzaId must be provided.');

        $this->pizzaId = $pizzaId;
    }

    private function setName(string $name): void
    {
        Assert::notEmpty($name, 'The name must be provided.');
        Assert::maxLength($name, 30, 'Name must be 30 characters or less.');

        $this->name = $name;
    }

    private function setToppings(array $toppings)
    {
        Assert::minCount($toppings, 'At least one topping must be provided.');
        Assert::allStringNotEmpty($toppings, 'Topping must be at least 1 character length.');
        Assert::allMaxLength($toppings, 30, 'Topping must be 30 characters or less.');

        $this->toppings = $toppings;
    }
}
