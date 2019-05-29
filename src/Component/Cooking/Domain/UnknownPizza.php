<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Component\Cooking\Domain;

use InvalidArgumentException;

class UnknownPizza extends InvalidArgumentException
{
    public function __construct(string $flavourId)
    {
        parent::__construct(sprintf('We can not find any pizza in our menu with name "%s"', $flavourId));
    }
}
