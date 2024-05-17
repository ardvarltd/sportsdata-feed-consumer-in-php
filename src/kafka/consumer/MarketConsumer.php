<?php

require_once 'vendor/autoload.php';

use App\kafka\consumer\AvroConsumer;

$marketTopic = getenv('MARKET_TOPIC', true) ?: getenv('MARKET_TOPIC');

$avroConsumer = new AvroConsumer($marketTopic);
$avroConsumer->consume();
