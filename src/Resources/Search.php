<?php declare(strict_types=1);

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
