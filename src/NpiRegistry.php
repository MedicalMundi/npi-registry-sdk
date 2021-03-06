<?php declare(strict_types=1);

/**
 * This file is part of the medicalmundi/npi-registry-php-sdk library
 *
 * @copyright (c) Zerai Teclai <teclaizerai@googlemail.com>.
 * @copyright (c) Francesca Bonadonna <francescabonadonna@googlemail.com>.
 *
 * This software consists of voluntary contributions made by many individuals
 * {@link https://github.com/MedicalMundi/npi-registry-sdk/graphs/contributors developer} and is licensed under the MIT license.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @license http://opensource.org/licenses/MIT MIT
 */

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
    private const NPI_REGISTRY_URL = 'https://npiregistry.cms.hhs.gov';

    public function __construct(string $url = self::NPI_REGISTRY_URL)
    {
        parent::__construct(new ClientBuilder(
            Uri::fromString($url),
            HttpClient::build(
                new Psr18Client(),
                new Psr18Client(),
                new Psr18Client()
            ),
            new NullStrategy(),
            new Container()
        ));
    }

    public static function connect(string $url = self::NPI_REGISTRY_URL): self
    {
        $client = new self($url);
        $client->addResource('search', new Search());

        return $client;
    }
}
