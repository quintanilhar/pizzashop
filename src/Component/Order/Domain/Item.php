<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Component\Order\Domain;

use Quintanilhar\PizzaShop\Domain\Uuid;
use Webmozart\Assert\Assert;

class Item
{
    /** @var Uuid */
    private $id;

    /** @var string */
    private $name;

    /** @var float */
    private $price;

    public function __construct(Uuid $id, string $name, float $price)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setPrice($price);
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function price(): float
    {
        return $this->price;
    }

    private function setId(Uuid $id): void
    {
        Assert::notNull($id, 'The id must be provided.');

        $this->id = $id;
    }

    private function setName(string $name): void
    {
        Assert::notEmpty($name, 'The name must be provided.');
        Assert::maxLength($name, 30, 'Name must be 30 characters or less.');

        $this->name = $name;
    }

    private function setPrice(float $price): void
    {
        Assert::greaterThan($price, 0, 'Price must be at least 0.01.');

        $this->price = $price;
    }
}
