<?php

declare(strict_types=1);

namespace App\Domain\Character\Request;

use App\Domain\Core\Request\CoreRequest;

final class CreateCharacterRequest extends CoreRequest implements CreateCharacterRequestInterface
{
    protected static array $requestPossibleFields = [
        'name' => true, // required field
    ];
}