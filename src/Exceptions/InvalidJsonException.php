<?php

namespace Luna\Vnstat\Exceptions;

use Exception;

/**
 * Class InvalidJsonException
 *
 * @package Luna\Vnstat\Exceptions
 * @author  Thomas Wiringa <thomas.wiringa@gmail.com>
 */
class InvalidJsonException extends \Exception
{
    /**
     * InvalidJsonException constructor.
     *
     * @param  string  $message
     * @param  int  $code
     * @param  Exception|null  $previous
     */
    public function __construct($message = "Invalid JSON returned by vnstat", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
