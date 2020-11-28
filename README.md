# NPI Registry SDK
HTTP client for the [National Provider Identifier Registry Public records api](https://npiregistry.cms.hhs.gov/registry/help-api).

[![Version](https://poser.pugx.org/medicalmundi/npi-registry-php-sdk/version)](//packagist.org/packages/medicalmundi/npi-registry-php-sdk)
[![License](https://poser.pugx.org/medicalmundi/npi-registry-php-sdk/license)](//packagist.org/packages/medicalmundi/npi-registry-php-sdk)
![CI](https://github.com/MedicalMundi/npi-registry-sdk/workflows/CI/badge.svg?branch=main)
[![Total Downloads](https://poser.pugx.org/medicalmundi/npi-registry-php-sdk/downloads)](//packagist.org/packages/medicalmundi/npi-registry-php-sdk)
[![Latest Unstable Version](https://poser.pugx.org/medicalmundi/npi-registry-php-sdk/v/unstable)](//packagist.org/packages/medicalmundi/npi-registry-php-sdk)
[![composer.lock](https://poser.pugx.org/medicalmundi/npi-registry-php-sdk/composerlock)](//packagist.org/packages/medicalmundi/npi-registry-php-sdk)

## Requirements

- PHP ^7.4 | ^8.0
- PHP ext-json

## Installation

The preferred method of installation is to use composer:

```bash
$ composer require medicalmundi/npi-registry-php-sdk
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

⚠ Launching early stage releases (0.x.x) could break the API according to [Semantic Versioning 2.0](https://semver.org/). We are using *minor* for breaking changes.
This will change with the release of the stable `1.0.0` version.
