<?php

namespace App\UseCase\GetTeamGames;

final class Request
{
    public function __construct(
        private readonly string $teamId
    ) {
    }

    public function getTeamId(): string
    {
        return $this->teamId;
    }
}
