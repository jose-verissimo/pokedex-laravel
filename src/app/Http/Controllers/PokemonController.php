<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;

class PokemonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function inventory()
    {
        $pokemons = Pokemon::all();

        return view('pages.pokemon.inventory', [
            'pokemons' => $pokemons
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function catchEmAll()
    {
        $pokemons = Pokemon::all();

        return view('pages.pokemon.catchEmAll', [
            'pokemons' => $pokemons
        ]);
    }
}
