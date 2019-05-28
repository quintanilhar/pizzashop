<?php declare(strict_types=1);

namespace Quintanilhar\PhpExtension\Uuid;

use Ramsey\Uuid\Uuid as RamseyUuid;

final class Uuid
{
    /**
     * @var string
     */
    private $uuid;

    public function __construct(string $uuid)
    {
        if (!self::isValid($uuid)) {
            throw new InvalidUuidException($uuid);
        }

        $this->uuid = $uuid;
    }

    public function __toString(): string
    {
        return $this->uuid;
    }

    public static function isValid(string $uuid): bool
    {
        return RamseyUuid::isValid($uuid);
    }

    public static function generate(): Uuid
    {
        return new static(RamseyUuid::uuid4()->toString());
    }
}
