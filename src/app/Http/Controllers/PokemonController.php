<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Pokemon;
use App\User;

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
     * Show the pokemons in the user's inventory.
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function inventory(Request $request)
    {
        return view('pages.pokemon.inventory', [
            'pokemonInventory' => $request->user()->pokemons()->get()
        ]);
    }

    /**
     * Show all pokemons.
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


    /**
     * Create a relation between the logged user and the clicked pokemon.
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function catch(Request $request) {
        
        // Get pokemon entry.
        $pokemon = Pokemon::find($request['pokemonModal']['id']);

        // Create relation.
        $request->user()->pokemons()->save($pokemon);

        return true;
    }


    /**
     * Delete relation between the logged user and the clicked pokemon.
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function release(Request $request) {
        try {    
            // Create relation.
            $request->user()->pokemons()->find($request['pokemonModal']['id'])->delete();
        } catch (\Throwable $th) {
            return false;
        }

        return true;
    }
}
