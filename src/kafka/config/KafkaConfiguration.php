<?php
namespace App\kafka\config;
use RdKafka\Conf;


class KafkaConfiguration
{
    private $bootstrapServers;
    private $saslMechanism;
    private $securityProtocol;
    private $saslUsername;
    private $saslPassword;
    private $clientId;
    private $groupId;
    private $autoOffset;

    public Conf $conf;

    public function __construct()
    {
        $this->bootstrapServers = getenv('BOOTSTRAP_SERVERS', true) ?: getenv('BOOTSTRAP_SERVERS');
        $this->saslMechanism = getenv('SASL_MECHANISM', true) ?: getenv('SASL_MECHANISM');
        $this->securityProtocol = getenv('SECURITY_PROTOCOL', true) ?: getenv('SECURITY_PROTOCOL');
        $this->saslUsername = getenv('SASL_USERNAME', true) ?: getenv('SASL_USERNAME');
        $this->saslPassword = getenv('SASL_PASSWORD', true) ?: getenv('SASL_PASSWORD');
        $this->clientId = getenv('CLIENT_ID', true) ?: getenv('CLIENT_ID');
        $this->groupId = getenv('GROUP_ID', true) ?: getenv('GROUP_ID');
        $this->autoOffset = getenv('AUTO_OFFSET_RESET', true) ?: getenv('AUTO_OFFSET_RESET');

        $this->conf = new Conf();
        $this->conf->set('bootstrap.servers', $this->bootstrapServers );
        $this->conf->set('sasl.mechanism', $this->saslMechanism);
        $this->conf->set('security.protocol', $this->securityProtocol);
        $this->conf->set('sasl.username', $this->saslUsername);
        $this->conf->set('sasl.password', $this->saslPassword);
        $this->conf->set('client.id', $this->clientId);
        $this->conf->set('group.id', $this->groupId);
        $this->conf->set('auto.offset.reset', $this->autoOffset);
        $this->conf->set('log_level', LOG_DEBUG);
    }
}
