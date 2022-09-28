<?php

namespace App\Exceptions;

use Exception;

class MissingSomeParamException extends Exception
{
    protected $message = "There are not enough parameters";
}
