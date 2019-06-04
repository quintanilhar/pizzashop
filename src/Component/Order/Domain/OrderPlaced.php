<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Component\Order\Domain;

use DateTimeImmutable;
use DateTimeInterface;
use Quintanilhar\PizzaShop\Component\Cooking\Domain\PizzaId;
use Quintanilhar\PizzaShop\SharedKernel\Domain\DomainEvent;

final class OrderPlaced implements DomainEvent
{
    const VERSION = 1;

    /** @var OrderId  */
    private $orderId;

    /** @var PizzaId  */
    private $pizzaId;

    public function __construct(OrderId $orderId, PizzaId $pizzaId)
    {
        $this->orderId = $orderId;
        $this->pizzaId = $pizzaId;
    }

    public function orderId(): OrderId
    {
        return $this->orderId;
    }

    public function pizzaId(): PizzaId
    {
        return $this->pizzaId;
    }

    public function eventVersion(): int
    {
        return self::VERSION;
    }

    public function occurredOn(): DateTimeInterface
    {
        return new DateTimeImmutable('now');
    }
}
