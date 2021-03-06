<?php

declare(strict_types = 1);

namespace idOS\Endpoint\Profile\Process;

use GuzzleHttp\Client;
use idOS\Auth\AuthInterface;
use idOS\Endpoint\AbstractEndpoint;

abstract class AbstractProcessEndpoint extends AbstractEndpoint {
    protected $processId;
    protected $userName;

    /**
     * Constructor Class.
     *
     * @param int           $processId        The process' id
     * @param AuthInterface $authentication   The type of the authentication: UserToken, HandlerToken and IdentityToken
     * @param Client        $client
     * @param bool|bool     $throwsExceptions
     */
    public function __construct(
        int $processId,
        string $userName,
        AuthInterface $authentication,
        Client $client,
        bool $throwsExceptions = false
    ) {
        $this->processId = $processId;
        $this->userName  = $userName;
        parent::__construct($authentication, $client, $throwsExceptions);
    }
}
