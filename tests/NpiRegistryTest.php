<?php

declare(strict_types=1);

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
    public function it_can_create_with_factory_method_connect(): void
    {
        $npiRegistry = NpiRegistry::connect();

        self::assertInstanceOf(NpiRegistry::class, $npiRegistry);
        self::assertEquals(self::NPI_REGISTRY_API_ENDPOINT, $npiRegistry->uri());
    }

    /** @test */
    public function it_can_fetch_search_results_from_the_api()
    {
        $client = NpiRegistry::connect();

        $this->assertIsObject(
            $client->search
                ->where('version', '2.1')
                ->where('city', 'atlanta')
                ->fetch()
        );
    }
}
