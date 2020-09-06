<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemons';
    
    /**
     * Inverse relation between the user and pokemon, in case I need it.
     */
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
