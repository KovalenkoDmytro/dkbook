<?php

namespace App\Implementations\Results;

use App\Interfaces\Results\IResult;

class ErrorResult implements IResult
{
    private string $type = 'error';

    private string $message;

    private int $status;

    private array $data;

    public function __construct(string $message, int $status)
    {
        $this->message = $message;
        $this->status = $status;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
