<?php

namespace App\Implementations\Results;

use App\Interfaces\Results\IResult;

class ErrorResult implements IResult
{
    private string $message = "Something went wrong. Please try again.";

    private string $type = 'error';

    public function __construct(){}

    public function getType(): string
    {
        return $this->type;
    }

    public function getMessage(): string
    {
        return $this->message;
    }


}
