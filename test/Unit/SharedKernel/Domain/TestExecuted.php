<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Test\Unit\SharedKernel\Domain;

use DateTimeImmutable;
use DateTimeInterface;
use Quintanilhar\PizzaShop\SharedKernel\Domain\DomainEvent;

class TestExecuted implements DomainEvent
{
    /** @var string */
    private $testName;

    public function __construct(string $testName)
    {
        $this->testName = $testName;
    }

    public function eventVersion(): int
    {
        return 1;
    }

    public function occurredOn(): DateTimeInterface
    {
        return new DateTimeImmutable('now');
    }

    public function testName(): string
    {
        return $this->testName;
    }
}
