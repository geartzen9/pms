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
     * Set a player's broke state.
     *
     * @param bool $broke
     * @return void
     */
    public function setBroke(bool $broke): void
    {
        static::update([
            'is_broke' => true
        ]);
    }

    /**
     * Set e player's rebought state.
     *
     * @param bool $rebought
     * @return void
     */
    public function setRebought(bool $rebought): void
    {
        static::update([
            'has_rebought' => $rebought
        ]);
    }
}