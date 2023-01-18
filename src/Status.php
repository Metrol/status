<?php
/**
 * @author        Michael Collette <metrol@metrol.net>
 * @copyright (c) 2022, Metrol Networks
 */

namespace Metrol;

use ReflectionClass;
use ReflectionException;

/**
 * Provide a reference of status codes
 *
 */
class Status
{
    /**
     * The default status code
     *
     */
    const _DEFAULT = self::NOTRUN;

    /**
     * The object has not yet been run
     *
     */
    const NOTRUN = 0;

    /**
     * Still collecting data, but all is good so far
     *
     */
    const PROCESSING = 102;

    /**
     * Everything is good to go
     *
     */
    const OK = 200;

    /**
     * The request has succeeded and a new resource has been created as a result.
     *
     */
    const CREATED = 201;

    /**
     * Request has been received but not acted on
     *
     */
    const ACCEPTED = 202;

    /**
     * The no data to present
     *
     */
    const NO_CONTENT = 204;

    /**
     * Permanent redirect to a resource that has been moved
     *
     */
    const MOVED_PERMANENT = 301;

    /**
     * Temporary redirect to another place
     *
     */
    const MOVED_TEMP = 307;

    /**
     * What was requested was not property formed in some way
     *
     */
    const BAD_REQUEST = 400;

    /**
     * Not authorized to view content
     *
     */
    const NO_AUTH = 401;

    /**
     * The requested information not found
     *
     */
    const NOT_FOUND = 404;

    /**
     * Some pre-condition was not met
     *
     */
    const PRECONDITION_FAILED = 412;

    /**
     * When the media type is not supported
     *
     */
    const UNSUPPORTED_MEDIA = 415;

    /**
     * Stats code: Unable to process request
     *
     */
    const UNABLE_TO_PROCESS = 422;

    /**
     * Some kind of error occurred preventing the request from processing
     *
     */
    const INTERNAL_ERROR = 500;

    /**
     * Service Unavailable
     *
     * The server is currently unable to handle the request due to a temporary
     * overloading or maintenance of the server.
     *
     */
    const SERVICE_UNAVAIL = 503;

    /**
     * Never a need to instantiate this class.  This is a reference only
     *
     */
    private function __construct()
    {

    }

    /**
     * Check to see if the value is legit
     *
     */
    static public function isValid(int $value): bool
    {
        $constList = static::getKeyValues();

        if ( in_array($value, $constList) )
        {
            return true;
        }

        return false;
    }

    /**
     * Provide the appropriate HTTP text for the specified status code
     *
     */
    static public function getHTTPStatusText(int $statusCode): string
    {
        return match ($statusCode)
        {
            0   => 'Not Run',
            100 => 'Continue',
            101 => 'Switching Protocols',
            102 => 'Processing',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Moved Temporarily',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Time-out',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Large',
            415 => 'Unsupported Media Type',
            422 => 'Unable to process request',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Time-out',
            505 => 'HTTP Version not supported',
            default => '',
        };
    }

    /**
     * Get a list of all the class constants defined
     *
     */
    static public function getKeyValues(): array
    {
        $calledClass = get_called_class();

        try
        {
            $oClass = new ReflectionClass($calledClass);
        }
        catch ( ReflectionException )
        {
            return [];
        }

        return $oClass->getConstants();
    }
}
