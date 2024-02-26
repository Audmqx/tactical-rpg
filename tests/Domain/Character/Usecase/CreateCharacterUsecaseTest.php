<?php

declare(strict_types=1);

namespace Tests\Domain\Character\Usecase;

use App\Domain\Character\Request\CreateCharacterRequest;
use App\Domain\Character\Usecase\CreateCharacterUsecase;
use App\Domain\Character\Usecase\CreateCharacterUsecaseInterface;
use App\Domain\Core\Presenter\CorePresenter;
use App\Services\Provider\IdentifierProvider;
use Cleancoders\Core\Presenter\PresenterInterface;
use Database\MySQL\Character\Repository\CharacterRepository;
use PHPUnit\Framework\TestCase;

final class CreateCharacterUsecaseTest extends TestCase
{
    private CreateCharacterUsecaseInterface $createCharacterUsecase;
    private PresenterInterface $createCharacterPresenter;

    protected function setUp(): void
    {
        $characterRepository = new CharacterRepository();
        $identifierProvider = new IdentifierProvider();
        $this->createCharacterUsecase = new CreateCharacterUsecase($identifierProvider, $characterRepository);

        $this->createCharacterPresenter = new class() extends CorePresenter implements PresenterInterface {

        };
    }

    public function testCreateCharacterSuccessfully(): void
    {
        $request = CreateCharacterRequest::createFromPayload([
            'name' => 'toto'
        ]);

        $this
            ->createCharacterUsecase
            ->setRequest($request)
            ->setPresenter($this->createCharacterPresenter)
            ->execute();
        
        $response = $this->createCharacterPresenter->getResponse();

        dd($response);
    }
}