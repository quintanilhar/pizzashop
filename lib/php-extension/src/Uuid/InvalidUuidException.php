<?php declare(strict_types=1);

namespace Quintanilhar\PhpExtension\Uuid;

use InvalidArgumentException;

class InvalidUuidException extends InvalidArgumentException
{
    public function __construct(string $uuid)
    {
        parent::__construct(sprintf('The uuid "%s" is not valid.', $uuid));
    }
}
