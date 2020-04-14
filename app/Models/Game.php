<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * Class Game
 * @package App\Models
 */
class Game extends Model
{
    function players()
    {
        return $this->hasMany(User::class);
    }
}