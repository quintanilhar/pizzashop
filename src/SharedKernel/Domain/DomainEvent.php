<?php

namespace Quintanilhar\PizzaShop\SharedKernel\Domain;

use DateTimeInterface;

interface DomainEvent
{
    public function eventVersion(): int;

    public function occurredOn(): DateTimeInterface;
}
