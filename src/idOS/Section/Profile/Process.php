<?php

declare(strict_types = 1);

namespace idOS\Section\Profile;

use GuzzleHttp\Client;
use idOS\Auth\AuthInterface;
use idOS\Endpoint\EndpointInterface;
use idOS\Section\AbstractSection;

class Process extends AbstractSection {
    /**
     * The process id necessary for all /process base endpoint.
     */
    private $processId;

    /**
     * Constructor Class.
     *
     * @param int           $processId
     * @param string        $userName
     * @param AuthInterface $authentication
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

    /**
     * returns the endpoint called passing the process id inside constructor.
     *
     * @param string $name
     *
     * @return endpoint instance
     */
    public function __get(string $name) : EndpointInterface {
        $className = $this->getEndpointClassName($name);

        return new $className(
            $this->processId,
            $this->userName,
            $this->authentication,
            $this->client
        );
    }
}
