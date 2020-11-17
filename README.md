# NPI Registry SDK
HTTP client for the NPI Registry Public records api.

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

## Searching provider

You create a Npi registry SDK like so:

```php
use MedicalMundi\NpiRegistry\SDK\NpiRegistry;

$npiRegistry = NpiRegistry::connect();
$npiRegistry->search
            ->where('version', '2.1') // api version is mandatory
            ->where('city', 'atlanta')
            ->fetch();
```
