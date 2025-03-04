<?php
require_once 'vendor/autoload.php';

use App\kafka\consumer\AvroConsumer;

$leaguesTopic = getenv('LEAGUES_TOPIC', true) ?: getenv('LEAGUES_TOPIC');

$avroConsumer = new AvroConsumer($leaguesTopic);
$avroConsumer->consume();
