<?php
require_once 'vendor/autoload.php';

use App\kafka\consumer\AvroConsumer;

$gamePeriodsTopic = getenv('GAME_PERIODS_TOPIC', true) ?: getenv('GAME_PERIODS_TOPIC');

$avroConsumer = new AvroConsumer($gamePeriodsTopic);
$avroConsumer->consume();
