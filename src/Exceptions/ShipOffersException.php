<?php

namespace Thiio\Affirm\Exceptions;

use Exception;


final class AffirmException extends Exception
{
    public function __construct($message = null)
    {
        parent::__construct($message);
    }
}