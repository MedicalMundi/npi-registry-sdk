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

namespace MedicalMundi\NpiRegistry\SDK\Resources;

use JustSteveKing\PhpSdk\Resources\AbstractResource;

final class Search extends AbstractResource
{
    protected string $path = '/api';

    /**
     * @return null|array
     */
    public function fetch(): ?object
    {
        $response = $this->get()->getBody()->getContents();

        return json_decode($response);
    }
}
