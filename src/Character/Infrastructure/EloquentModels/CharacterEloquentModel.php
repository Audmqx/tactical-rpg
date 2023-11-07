<?php

namespace Src\CharacterInfrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Model;

class CharacterEloquentModel extends Model
{
    protected $table = 'characters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'health_points',
        'weapon',
        'alignement',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}