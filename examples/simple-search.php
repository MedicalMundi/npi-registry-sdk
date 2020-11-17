<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use MedicalMundi\NpiRegistry\SDK\NpiRegistry;

$npiRegistry = NpiRegistry::connect();

$data = $npiRegistry->search
    ->where('version', '2.1') // api version is mandatory
    ->where('city', 'atlanta')
    ->fetch();

var_dump($data);
