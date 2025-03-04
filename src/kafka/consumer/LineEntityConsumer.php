<?php
require_once 'vendor/autoload.php';

use App\kafka\consumer\AvroConsumer;

$lineEntitiesTopic = getenv('LINE_ENTITIES_TOPIC', true) ?: getenv('LINE_ENTITIES_TOPIC');

$avroConsumer = new AvroConsumer($lineEntitiesTopic);
$avroConsumer->consume();
