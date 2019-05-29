<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Component\Order\Domain;

use Quintanilhar\PizzaShop\Domain\Uuid;
use Webmozart\Assert\Assert;

class Order
{
    /** @var OrderId */
    private $orderId;

    /** @var Item */
    private $item;

    /** @var float */
    private $total;

    public function __construct(OrderId $orderId)
    {
        $this->setOrderId($orderId);
    }

    public function orderId(): OrderId
    {
        return $this->orderId;
    }

    public function total(): float
    {
        return $this->total;
    }

    public function item(): ?Item
    {
        return $this->item;
    }

    public function addItem(Uuid $id, string $name, float $price): void
    {
        $this->item = new Item($id, $name, $price);

        $this->total = $price;
    }

    private function setOrderId(OrderId $orderId): void
    {
        Assert::notNull($orderId, 'The orderId must be provided.');

        $this->orderId = $orderId;
    }
}
