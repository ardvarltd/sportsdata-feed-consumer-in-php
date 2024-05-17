<?php

namespace App\kafka\consumer;

use App\kafka\AvroRecordSerializer;
use App\kafka\config\KafkaConfiguration;
use RdKafka\KafkaConsumer;

class AvroConsumer
{

    private KafkaConfiguration $kafkaConfiguration;
    private KafkaConsumer $consumer;
    private AvroRecordSerializer $avroRecordSerializer;

    public function __construct($topic)
    {
        $this->kafkaConfiguration = new KafkaConfiguration();
        $this->consumer = new KafkaConsumer($this->kafkaConfiguration->conf);
        $this->consumer->subscribe([$topic]);
        $this->avroRecordSerializer = new AvroRecordSerializer();
    }

    public function consume(){
        while (true) {
            $message = $this->consumer->consume(120*1000);
            switch ($message->err) {
                case RD_KAFKA_RESP_ERR_NO_ERROR:
                    $formatedMessage = $this->avroRecordSerializer->getFormatedMessage($message);
                    echo $formatedMessage;
                    break;
                case RD_KAFKA_RESP_ERR__PARTITION_EOF:
                    echo "No more messages; will wait for more\n";
                    break;
                case RD_KAFKA_RESP_ERR__TIMED_OUT:
                    echo "Timed out\n";
                    break;
                default:
                    throw new \Exception($message->errstr(), $message->err);
            }
        }
    }
}
