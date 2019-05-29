<?php

namespace Quintanilhar\PizzaShop\Test\Unit\SharedKernel\Domain;

use DateTimeImmutable;
use DateTimeInterface;
use PHPUnit\Framework\TestCase;
use Quintanilhar\PizzaShop\SharedKernel\Domain\DomainEvent;
use Quintanilhar\PizzaShop\SharedKernel\Domain\DomainEventPublisher;
use Quintanilhar\PizzaShop\SharedKernel\Domain\DomainEventSubscriber;

class DomainEventPublisherTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_publish_aDomainEvent()
    {
        $event = new TestExecuted('publish-domain-event');

        $subscriber = new DynamicSubscriber(TestExecuted::class);

        $domainEventPublisher = DomainEventPublisher::instance();

        $domainEventPublisher->subscribe($subscriber);

        $domainEventPublisher->publish($event);

        $eventPublished = $subscriber->publishedEvent();

        $this->assertSame(1, $eventPublished->eventVersion());
        $this->assertInstanceOf(DateTimeInterface::class, $eventPublished->occurredOn());
        $this->assertSame('publish-domain-event', $eventPublished->testName());
    }

    /**
     * @test
     */
    public function ensure_subscriber_is_triggered_for_the_right_event_type()
    {
        $subscriber = new DynamicSubscriber(TestExecuted::class);

        $domainEventPublisher = DomainEventPublisher::instance();

        $domainEventPublisher->subscribe($subscriber);

        $domainEventPublisher->publish(new class implements DomainEvent {
            public function eventVersion(): int
            {
                return 1;
            }

            public function occurredOn(): DateTimeInterface
            {
                return new DateTimeImmutable('now');
            }
        });

        $this->assertNull($subscriber->publishedEvent());
    }

    /**
     * @test
     */
    public function ensure_all_subscribers_are_triggered_for_event_type()
    {
        $testExecutedSubscriber = new DynamicSubscriber(TestExecuted::class);
        $genericSubscriber = new DynamicSubscriber(DomainEvent::class);

        $domainEventPublisher = DomainEventPublisher::instance();

        $domainEventPublisher->subscribe($testExecutedSubscriber);
        $domainEventPublisher->subscribe($genericSubscriber);

        $event = new TestExecuted('subscribers-are-triggered');

        $domainEventPublisher->publish($event);

        $this->assertSame($event, $testExecutedSubscriber->publishedEvent());
        $this->assertSame($event, $genericSubscriber->publishedEvent());
    }
}
