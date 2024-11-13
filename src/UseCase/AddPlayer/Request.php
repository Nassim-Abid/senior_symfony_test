<?php

namespace App\UseCase\AddPlayer;

final class Request
{
    public function __construct(
        private readonly string $teamId,
        private readonly string $playerId
    ) {
    }

    public function getTeamId(): string
    {
        return $this->teamId;
    }

    public function getPlayerId(): string
    {
        return $this->playerId;
    }
}
