<?php

namespace Src\Character\Presentation;

use Illuminate\Http\JsonResponse;
use Src\Character\Application\UseCases\CreateEnnemy;
use Src\Character\Domain\Factories\CharacterFactory;
use Src\Character\Domain\Factories\HealthPointsFactory;
use Src\Character\Domain\Factories\WeaponFactory;
use Src\Common\Domain\Exceptions\UnauthorizedUserException;
use Src\Common\Infrastructure\Laravel\Controller;
use Symfony\Component\HttpFoundation\Response;

class CharacterController extends Controller
{
    public function index(): JsonResponse
    {

        $healthPointsFactory = new HealthPointsFactory;
        $weaponFactory = new WeaponFactory;
        $characterFactory = new CharacterFactory;

        $ennemy = new CreateEnnemy($healthPointsFactory, $weaponFactory, $characterFactory, 'Angus'); 

        $ennemy = $ennemy->execute();

        // try {
        //     return response()->success((new FindAllUsersQuery())->handle());
        // } catch (UnauthorizedUserException $e) {
        //     return response()->error($e->getMessage(), Response::HTTP_UNAUTHORIZED);
        // }
    }
}