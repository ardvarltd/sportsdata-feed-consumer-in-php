<?php
require_once 'vendor/autoload.php';

use App\kafka\consumer\AvroConsumer;

$countriesTopic = getenv('COUNTRIES_TOPIC', true) ?: getenv('COUNTRIES_TOPIC');

$avroConsumer = new AvroConsumer($countriesTopic);
$avroConsumer->consume();
