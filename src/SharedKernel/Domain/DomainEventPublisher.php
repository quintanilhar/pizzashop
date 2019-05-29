<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\SharedKernel\Domain;

class DomainEventPublisher
{
    /** @var DomainEventSubscriber[] */
    private $subscribers = [];

    /**
     * @var DomainEventPublisher
     */
    private static $self;

    /**
     * @return DomainEventPublisher
     */
    public static function instance()
    {
        if (static::$self === null)
        {
            static::$self = new static();
        }

        return static::$self;
    }

    public function publish(DomainEvent $event): void
    {
        $eventTypes = array_merge(
            [get_class($event)],
            array_values(class_implements($event))
        );

        foreach ($eventTypes as $eventType)
        {
            $subscribedEventList = $this->subscribers[$eventType] ?? [];

            if (empty($subscribedEventList))
            {
                continue;
            }

            /** @var  $subscriber */
            array_map(
                function (DomainEventSubscriber $subscriber) use ($event) {
                    $subscriber->handleEvent($event);
                },
                $subscribedEventList
            );
        }
    }

    public function subscribe(DomainEventSubscriber $subscriber): void
    {
        $this->subscribers[$subscriber->subscribedToEventType()][] = $subscriber;
    }
}
