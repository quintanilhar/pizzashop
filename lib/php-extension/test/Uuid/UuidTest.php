<?php

namespace Quintanilhar\PhpExtension\Test\Uuid;

use PHPUnit\Framework\TestCase;
use Quintanilhar\PhpExtension\Uuid\InvalidUuidException;
use Quintanilhar\PhpExtension\Uuid\Uuid;

class UuidTest extends TestCase
{
    /**
     * @test
     */
    public function ensure_given_uuid_is_valid()
    {
        $this->expectException(InvalidUuidException::class);

        new Uuid('some-invalid-uuid');
    }

    /**
     * @test
     */
    public function it_can_validate_anUuid()
    {
        $this->assertFalse(Uuid::isValid('my-new-invalid-uuid'));

        $this->assertTrue(Uuid::isValid('25769c6c-d34d-4bfe-ba98-e0ee856f3e7a'));
    }

    /**
     * @test
     */
    public function it_can_generate_new_uuid()
    {
        $uuid = Uuid::generate();

        $this->assertInstanceOf(Uuid::class, $uuid);
    }

    /**
     * @test
     */
    public function it_can_be_converted_to_string()
    {
        $rawUuid = '25769c6c-d34d-4bfe-ba98-e0ee856f3e7a';

        $uuid = new Uuid($rawUuid);

        $this->assertSame($rawUuid, (string) $uuid);
    }
}
