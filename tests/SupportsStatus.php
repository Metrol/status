<?php

namespace Metrol\Tests;

use Metrol\{Status, StatusTrait, StatusInterface};

/**
 * Describe purpose of SupportsStatus
 *
 */
class SupportsStatus implements StatusInterface
{
    use StatusTrait;

    /**
     * Instantiate SupportsStatus
     *
     */
    public function __construct()
    {

    }

    public function setToOk(): void
    {
        $this->setStatus(Status::OK);
    }

    public function setBadStatus(): void
    {
        $this->setStatus(1234);
    }

    public function pushMessageIn($message): void
    {
        $this->setMessage($message);
    }
}
