<?php declare(strict_types=1);


namespace MedicalMundi\NpiRegistry\SDK\Tests\Resources;

use JustSteveKing\HttpSlim\HttpClient;
use JustSteveKing\PhpSdk\Client;
use MedicalMundi\NpiRegistry\SDK\NpiRegistry;
use MedicalMundi\NpiRegistry\SDK\Resources\Search;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Psr18Client;

class SearchTest extends TestCase
{
    private Client $client;

    protected function setUp(): void
    {
        $this->client = NpiRegistry::connect('http://example.com');
        $this->client->addResource('search', new Search());
        $this->client->search->setHttp(
            HttpClient::build(
                new \Http\Mock\Client(),
                new Psr18Client(),
                new Psr18Client()
            )
        );
    }

    /** @test */
    public function it_can_get_all_actions()
    {
        $this->client->search
            ->where('version', '2.1')
            ->where('city', 'atlanta')
            ->fetch();
    }
}
