<?php

declare(strict_types=1);

namespace App\Domain\Character\Model;

final class Character
{
    const INITIAL_HEALTH_POINT = 60;
    const DEFAULT_STATUS = 'neutral';

    private int $healthPoint;
    private string $status;

    private function __construct(
        private string $id,
        private string $name,
    ) {
        $this->healthPoint = self::INITIAL_HEALTH_POINT;
        $this->status = self::DEFAULT_STATUS;
    }

    public static function create(string $identifier, string $name): self
    {
        return new self($identifier, $name);
    }

    public static function hydrate(string $identifier, string $name, int $healthPoint, string $status): self
    {
        $character = new self($identifier, $name);
        $character->healthPoint = $healthPoint;
        $character->status = $status;

        return $character;
    }

    public function identifier(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function healthPoint(): int
    {
        return $this->healthPoint;
    }

    public function status(): string
    {
        return $this->status;
    }
}