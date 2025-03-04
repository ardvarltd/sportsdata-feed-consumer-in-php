<?php
require_once 'vendor/autoload.php';

use App\kafka\consumer\AvroConsumer;

$marketTypesTopic = getenv('MARKET_TYPES_TOPIC', true) ?: getenv('MARKET_TYPES_TOPIC');

$avroConsumer = new AvroConsumer($marketTypesTopic);
$avroConsumer->consume();
