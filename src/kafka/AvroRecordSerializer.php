<?php

namespace App\kafka;

use FlixTech\AvroSerializer\Objects\RecordSerializer;
use RdKafka\Message;

class AvroRecordSerializer
{
    public RecordSerializer $recordSerializer;

    public function __construct()
    {
        $schemaRegistry = new SchemaRegistry();
        $this->recordSerializer = new RecordSerializer(
            $schemaRegistry->schemaRegistryClient,
            [
                // If you want to auto-register missing schemas set this to true
                RecordSerializer::OPTION_REGISTER_MISSING_SCHEMAS => false,
                // If you want to auto-register missing subjects set this to true
                RecordSerializer::OPTION_REGISTER_MISSING_SUBJECTS => false,
            ]
        );
    }

    public function getFormatedMessage(Message $message)
    {
        $record = $this->recordSerializer->decodeMessage($message->payload);
        $json = var_export(json_encode($record, JSON_PRETTY_PRINT), true);
        $json = str_replace('\\\\"', '\\"', $json);
        return $json  . "\n";
    }
}
