<?php

namespace App\Exceptions;

use Exception;

class OperationNotFoundException extends Exception
{
    protected $message = "Operation does not exist";
}
