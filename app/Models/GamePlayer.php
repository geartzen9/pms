<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class GamePlayer
 * @package App\Models
 */
class GamePlayer extends Model
{
    /**
     * @param bool $broke
     * @return void
     */
    public function setBroke(bool $broke): void
    {
        static::update([
            'is_broke' => true
        ]);
    }
}