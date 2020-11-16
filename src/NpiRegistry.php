<?php

declare(strict_types=1);

namespace MedicalMundi\NpiRegistry\SDK;

use DI\Container;
use JustSteveKing\HttpAuth\Strategies\NullStrategy;
use JustSteveKing\HttpSlim\HttpClient;
use JustSteveKing\PhpSdk\Client;
use JustSteveKing\PhpSdk\ClientBuilder;
use JustSteveKing\UriBuilder\Uri;
use MedicalMundi\NpiRegistry\SDK\Resources\Search;
use Symfony\Component\HttpClient\Psr18Client;

class NpiRegistry extends Client
{
    public function __construct(string $url = 'https://npiregistry.cms.hhs.gov')
    {
        parent::__construct(new ClientBuilder(
            Uri::fromString($url),
            HttpClient::build(
                new Psr18Client(), // http client (psr-18)
                new Psr18Client(), // request factory (psr-17)
                new Psr18Client() // stream factory (psr-17)
            ),
            new NullStrategy(),
            new Container() // container (psr-11)
        ));
    }

    public static function connect(string $url = 'https://npiregistry.cms.hhs.gov'): self
    {
        $client = new self($url);
        $client->addResource('search', new Search());

        return $client;
    }
}
