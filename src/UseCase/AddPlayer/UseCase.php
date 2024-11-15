<?php

namespace App\UseCase\AddPlayer;

use App\Domain\Exception\NotFoundException;
use App\Domain\Exception\ValidationException;
use App\Domain\Repository\PlayerRepository;
use App\Domain\Repository\TeamRepository;
use Symfony\Component\Uid\Uuid;
use Throwable;

class UseCase
{
    public function __construct(
        private readonly TeamRepository $teamRepository,
        private readonly PlayerRepository $playerRepository,
    ) {
    }

    public function __invoke(Request $request): Response
    {
        try {
            $teamId = Uuid::fromString($request->getTeamId());
            $playerId = Uuid::fromString($request->getPlayerId());
        } catch (Throwable $e) {
            throw new ValidationException('Bad request.');
        }

        $team = $this->teamRepository->get($teamId);
        if (null === $team) {
            throw new NotFoundException('Team not found.');
        }

        $player = $this->playerRepository->get($playerId);
        if (null === $player) {
            throw new NotFoundException('Player not found.');
        }

        $team->addPlayer($player);

        $this->teamRepository->save($team);

        return new Response();
    }
}
