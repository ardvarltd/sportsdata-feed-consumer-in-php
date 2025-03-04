<?php
require_once 'vendor/autoload.php';

use App\kafka\consumer\AvroConsumer;

$teamsTopic = getenv('TEAMS_TOPIC', true) ?: getenv('TEAMS_TOPIC');

$avroConsumer = new AvroConsumer($teamsTopic);
$avroConsumer->consume();
