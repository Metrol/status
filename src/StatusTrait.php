<?php
/**
 * @author        Michael Collette <metrol@metrol.net>
 * @copyright (c) 2022, Metrol Networks
 */

namespace Metrol;

/**
 * Provides status handling to be included in any kind of object that needs it
 *
 */
trait StatusTrait
{
    /**
     * The status
     *
     */
    private int $_status = Status::_DEFAULT;

    /**
     * A message that can be requested by a caller
     *
     */
    protected string $_message = '';

    /**
     * Provide the status code
     *
     */
    public function getStatus(): int
    {
        return $this->_status;
    }

    /**
     * Provide the message set
     *
     */
    public function getMessage(): string
    {
        return $this->_message;
    }

    /**
     * Set the status
     *
     */
    protected function setStatus(int $status, string $message = null): static
    {
        if ( Status::isValid($status) )
        {
            $this->_status = $status;
        }

        if ( ! is_null($message) )
        {
            $this->setMessage($message);
        }

        return $this;
    }

    /**
     * Set a message
     *
     */
    protected function setMessage(string $message): static
    {
        $this->_message = $message;

        return $this;
    }

    /**
     * Set the status and message to Processing
     *
     */
    protected function setProcessing(): void
    {
        $this->setStatus(Status::PROCESSING);
        $this->setMessage('Processing');
    }

    /**
     * Set the status to OK and provide a message
     *
     */
    protected function setOK(string $message = null): void
    {
        $this->setStatus(Status::OK);

        if ( ! empty($message) )
        {
            $this->setMessage($message);
        }
        else if ( is_null($message) and empty($this->_message) )
        {
            $this->setMessage('Process Finished Successfully');
        }
    }

    /**
     * Check to see if no longer processing
     *
     */
    protected function notProcessing(): bool
    {
        if ( $this->getStatus() !== Status::PROCESSING )
        {
            return true;
        }

        return false;
    }

    /**
     * Check if the status is set to anything but OK
     *
     */
    public function notOK(): bool
    {
        if ( $this->getStatus() !== Status::OK )
        {
            return true;
        }

        return false;
    }

    /**
     * Check if the status has been set to OK
     *
     */
    public function isOK(): bool
    {
        if ( $this->getStatus() === Status::OK )
        {
            return true;
        }

        return false;
    }
}
