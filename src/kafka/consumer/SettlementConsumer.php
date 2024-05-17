<?php

require_once 'vendor/autoload.php';

use App\kafka\consumer\AvroConsumer;

$settlementTopic = getenv('SETTLEMENT_TOPIC', true) ?: getenv('SETTLEMENT_TOPIC');

$avroConsumer = new AvroConsumer($settlementTopic);
$avroConsumer->consume();
