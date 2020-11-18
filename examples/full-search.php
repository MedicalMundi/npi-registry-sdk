<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use MedicalMundi\NpiRegistry\SDK\NpiRegistry;

$npiRegistry = NpiRegistry::connect();


/*
 * search by organization name and state
 */
$result = $npiRegistry->search
    ->where('version', '2.1') // api version is mandatory
    ->where('first_name', 'jh**')
    ->where('last_name', 'me**')
    ->fetch();

var_dump($result->result_count);
var_dump($result->results);


/*
 * search by organization name and state
 */
$result = $npiRegistry->search
    ->where('version', '2.1') // api version is mandatory
    ->where('organization_name', 'md**')
    ->where('state', 'AL')
    ->fetch();

var_dump($result->result_count);
var_dump($result->results);


/*
 * search by organization name and state
 */
$result = $npiRegistry->search
    ->where('version', '2.1') // api version is mandatory
    ->where('city', 'los angeles')
    ->fetch();

var_dump($result->result_count);
var_dump($result->results);


/*
 * search by taxonomy description
 */
$result = $npiRegistry->search
    ->where('version', '2.1') // api version is mandatory
    ->where('taxonomy_description', 'su**') //surgery
    ->fetch();

var_dump($result->result_count);
var_dump($result->results[0]->taxonomies[0]->code);
var_dump($result->results[0]->taxonomies[0]->desc);
var_dump($result->results[0]->taxonomies[0]->primary);
var_dump($result->results[0]->taxonomies[0]->state);
var_dump($result->results[0]->taxonomies[0]->license);
