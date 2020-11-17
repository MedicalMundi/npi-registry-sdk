<?php declare(strict_types=1);

namespace MedicalMundi\NpiRegistry\SDK\Tests;

use MedicalMundi\NpiRegistry\SDK\NpiRegistry;
use PHPUnit\Framework\TestCase;

class NpiRegistryTest extends TestCase
{
    private const NPI_REGISTRY_API_ENDPOINT = 'https://npiregistry.cms.hhs.gov';

    /** @test */
    public function it_can_create_client(): void
    {
        $npiRegistry = new NpiRegistry();

        self::assertInstanceOf(NpiRegistry::class, $npiRegistry);
        self::assertEquals(self::NPI_REGISTRY_API_ENDPOINT, $npiRegistry->uri());
    }

    /** @test */
    public function it_can_be_created_with_url(): void
    {
        $npiRegistry = new NpiRegistry($endpoint = 'http://example.com');

        self::assertInstanceOf(NpiRegistry::class, $npiRegistry);
        self::assertEquals($endpoint, $npiRegistry->uri());
    }

    /** @test */
    public function it_can_be_created_with_factory_method_connect(): void
    {
        $npiRegistry = NpiRegistry::connect();

        self::assertInstanceOf(NpiRegistry::class, $npiRegistry);
        self::assertEquals(self::NPI_REGISTRY_API_ENDPOINT, $npiRegistry->uri());
    }

    /** @test */
    public function it_can_be_created_with_factory_method_connect_and_url(): void
    {
        $npiRegistry = NpiRegistry::connect($endpoint = 'http://example.com');

        self::assertInstanceOf(NpiRegistry::class, $npiRegistry);
        self::assertEquals($endpoint, $npiRegistry->uri());
    }
}
