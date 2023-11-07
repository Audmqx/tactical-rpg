<?php

use Illuminate\Support\Facades\Route;
use Src\Character\Presentation\CharacterController;

Route::get('test', [CharacterController::class, 'index']);
