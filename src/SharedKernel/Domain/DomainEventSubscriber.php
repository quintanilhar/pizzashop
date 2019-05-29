<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\SharedKernel\Domain;

interface DomainEventSubscriber
{
    public function handleEvent(DomainEvent $event): void;

    public function subscribedToEventType(): string;
}
