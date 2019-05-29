<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Test\Unit\SharedKernel\Domain;

use Quintanilhar\PizzaShop\SharedKernel\Domain\DomainEvent;
use Quintanilhar\PizzaShop\SharedKernel\Domain\DomainEventSubscriber;

class DynamicSubscriber implements DomainEventSubscriber
{
    /** @var DomainEvent */
    private $publishedEvent;

    /** @var string */
    private $subscribedToEventType;

    public function __construct(string $subscribedToEventType)
    {
        $this->subscribedToEventType = $subscribedToEventType;
    }

    public function handleEvent(DomainEvent $event): void
    {
        $this->publishedEvent = $event;
    }

    public function subscribedToEventType(): string
    {
        return $this->subscribedToEventType;
    }

    public function publishedEvent(): ?DomainEvent
    {
        return $this->publishedEvent;
    }
}
