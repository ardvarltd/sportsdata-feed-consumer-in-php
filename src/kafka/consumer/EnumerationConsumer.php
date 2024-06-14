<?php

require_once 'vendor/autoload.php';

use App\kafka\consumer\AvroConsumer;

$enumerationTopic = getenv('ENUMERATION_TOPIC', true) ?: getenv('ENUMERATION_TOPIC');

$avroConsumer = new AvroConsumer($enumerationTopic);
$avroConsumer->consume();
