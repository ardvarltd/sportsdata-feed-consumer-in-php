<?php
require_once 'vendor/autoload.php';

use App\kafka\consumer\AvroConsumer;

$eventTopic = getenv('EVENT_TOPIC', true) ?: getenv('EVENT_TOPIC');

$avroConsumer = new AvroConsumer($eventTopic);
$avroConsumer->consume();
