<?php
/**
 * @author        Michael Collette <metrol@metrol.net>
 * @copyright (c) 2022, Metrol Networks
 */

namespace Metrol;

/**
 * Define what it means to support a running status on an object,
 *
 * Used to let consumer of an object that has the status trait what to expect
 *
 */
interface StatusInterface
{
    /**
     * Provide the status code
     *
     */
    public function getStatus(): int;

    /**
     * Provide the message set
     *
     */
    public function getMessage(): string;

    /**
     * Check if the status has been set to OK
     *
     */
    public function isOK(): bool;
}
