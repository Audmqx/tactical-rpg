<?php

declare(strict_types = 1);

namespace App\Domain\Core\Provider;

interface IdentifierProviderInterface
{
    public function generate(): string;
}