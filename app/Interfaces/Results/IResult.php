<?php

namespace App\Interfaces\Results;

interface IResult
{
    public function getType(): string;

    public function getMessage(): string;

    public function getData(): array;
}
