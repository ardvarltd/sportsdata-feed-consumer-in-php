<?php
require_once 'vendor/autoload.php';

use App\kafka\consumer\AvroConsumer;

$marketLinesTopic = getenv('MARKET_LINES_TOPIC', true) ?: getenv('MARKET_LINES_TOPIC');

$avroConsumer = new AvroConsumer($marketLinesTopic);
$avroConsumer->consume();
