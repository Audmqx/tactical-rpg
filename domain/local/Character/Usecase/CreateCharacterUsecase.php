<?php

declare(strict_types = 1);

namespace App\Domain\Character\Usecase;

use App\Domain\Character\Model\Character;
use App\Domain\Character\Repository\CharacterRepositoryInterface;
use App\Domain\Core\Exception\PersistenceException;
use App\Domain\Core\Provider\IdentifierProviderInterface;
use App\Domain\Core\Response\CoreResponse;
use App\Domain\Core\Usecase\CoreUsecase;

final class CreateCharacterUsecase extends CoreUsecase implements CreateCharacterUsecaseInterface
{
    public function __construct(
        private readonly IdentifierProviderInterface $identifierProvider,
        private readonly CharacterRepositoryInterface $characterRepository
    ) {
    }
    public function execute(): void
    {
        $requestData = $this->getRequestData();

        $newCharacter = Character::create(
            $this->identifierProvider->generate(),
            $requestData['name']
        );

        try {
            $this->characterRepository->save($newCharacter);
        } catch (PersistenceException $exception) {
            throw new PersistenceException(['message' => $exception->getMessage()]);
        }

        $this->presenter?->present(CoreResponse::create(
            message: 'character.successfully.created',
            statusCode: 201,
            data: [
                'id' => $newCharacter->identifier(),
            ]
        ));
    }
}