<?php

namespace App\Implementations\Results;

use App\Interfaces\Results\IResult;

class SuccessResult implements IResult
{

    private string $message;

    private string $type = 'success';



    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

}
