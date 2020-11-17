# NPI Registry SDK
HTTP client for the [National Provider Identifier Registry Public records api](https://npiregistry.cms.hhs.gov/registry/help-api).

## Requirements

- PHP ^7.4
- PHP ext-json

## Installation

The preferred method of installation is to use composer:

```bash
$ composer require medicalmundi/npi-registry-sdk
```

## Usage

You create a Npi registry SDK like so:

```php
use MedicalMundi\NpiRegistry\SDK\NpiRegistry;

$npiRegistry = NpiRegistry::connect();
```

## Searching providers

You create a Npi registry service,
use a search resource like so:

```php
use MedicalMundi\NpiRegistry\SDK\NpiRegistry;

$npiRegistry = NpiRegistry::connect();
$npiRegistry->search
            ->where('version', '2.1') // api version is mandatory
            ->where('city', 'atlanta')
            ->fetch();
```
