<?php

namespace App\kafka;

use FlixTech\SchemaRegistryApi\Registry\Cache\AvroObjectCacheAdapter;
use FlixTech\SchemaRegistryApi\Registry\CachedRegistry;
use FlixTech\SchemaRegistryApi\Registry\PromisingRegistry;
use GuzzleHttp\Client;

class SchemaRegistry
{
    public CachedRegistry $schemaRegistryClient;

    public function __construct()
    {
        $client = new Client(['base_uri' => getenv('SCHEMA_REGISTRY', true) ?: getenv('SCHEMA_REGISTRY')]);
        $this->schemaRegistryClient = new CachedRegistry(
            new PromisingRegistry($client),
            new AvroObjectCacheAdapter()
        );
    }
}
