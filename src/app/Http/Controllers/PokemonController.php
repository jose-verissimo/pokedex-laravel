<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * Show the pokemons in the user's inventory.
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function inventory(Request $request)
    {

        // Get results from DB instead, so we can get relation IDs.
        // This is because you can have the same pokemon multiple times.
        $pokemons = DB::table('pokemon_user')
                        ->select('relation_id', 'pokemons.*') 
                        ->leftJoin('pokemons', 'pokemon_user.pokemon_id', '=', 'pokemons.id')
                        ->where('user_id', $request->user()->id)
                        ->get();
        
        // For demo purposes, this is what I'd use for one to many relantionship:
        // $request->user()->pokemons()->get()

        return view('pages.pokemon.inventory', [
            'pokemonInventory' => $pokemons
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
            // Need to delete by relation id instead...
            // $request->user()->pokemons()->find($request['pokemonModal']['id'])->delete();

            // Delete relation ID, since it's a many to many relantionship.
            DB::table('pokemon_user')->where('relation_id', '=', $request['pokemonModal']['relation_id'])->delete();

        } catch (\Throwable $th) {
            return false;
        }

        return true;
    }
}
