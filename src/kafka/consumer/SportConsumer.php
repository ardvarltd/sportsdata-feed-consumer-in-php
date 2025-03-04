<?php
require_once 'vendor/autoload.php';

use App\kafka\consumer\AvroConsumer;

$sportsTopic = getenv('SPORTS_TOPIC', true) ?: getenv('SPORTS_TOPIC');

$avroConsumer = new AvroConsumer($sportsTopic);
$avroConsumer->consume();
