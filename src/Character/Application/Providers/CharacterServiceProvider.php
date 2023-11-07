<?php

namespace Src\Character\Application\Providers;

use Illuminate\Support\ServiceProvider;

class CharacterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \Src\Character\Domain\Repositories\CharacterRepositoryInterface::class,
            \Src\Character\Application\Repositories\CharacterRepository::class
        );
    }
}