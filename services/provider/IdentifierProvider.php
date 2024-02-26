<?php

declare(strict_types=1);

namespace App\Services\Provider;

use App\Domain\Core\Provider\IdentifierProviderInterface;

final class identifierProvider implements IdentifierProviderInterface
{
    public function generate(): string
    {
        return 'identifier_123456'; // replace by uuid library
    }
}