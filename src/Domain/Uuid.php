<?php declare(strict_types=1);

namespace Quintanilhar\PizzaShop\Domain;

use Quintanilhar\PhpExtension\Uuid\Uuid as PhpExtensionUuid;
use Webmozart\Assert\Assert;

abstract class Uuid
{
    /**
     * @var string
     */
    private $id;

    public function __construct(string $id)
    {
        $this->setId($id);
    }

    public function id(): string
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->id();
    }

    private function setId(string $id): void
    {
        Assert::notEmpty($id, 'The id must be provided.');

        $this->id = (string) new PhpExtensionUuid($id);
    }
}
