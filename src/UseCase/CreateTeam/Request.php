<?php

namespace App\UseCase\CreateTeam;

final class Request
{
    public function __construct(private readonly string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
}
