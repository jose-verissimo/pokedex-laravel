<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PokemonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Path to gist sent by Jake.
        $csvFilePath = "https://gist.githubusercontent.com/santiagoolivar2017/0591a53c4dd34ecd8488660c7372b0e3/raw/4be104b8bc8876acd15f8e21f1c5945f10e3aa1e/Pokemon-description-image.csv";

        // Array for pokemon.
        $allPokemons = [];
        $pokemonGuide = [];

        $csvFile = file($csvFilePath);

        foreach ($csvFile as $key => $line) {
            // If first line, set the keys.
            if ($key === 0) {
                foreach (str_getcsv($line) as $column) {
                    $pokemonGuide[] = $column;
                }
            } else {
                // Add data to with respective keys.
                $pokemon = [];
                foreach (str_getcsv($line) as $keyX => $value) {
                    $pokemon[$pokemonGuide[$keyX]] = $value;
                }
                $allPokemons[] = $pokemon;

            }
            
        }

        // Now loop through all the pokemons and add them in.
        foreach ($allPokemons as $pokemon) {
            DB::table('pokemons')->insert([
                'name' => $pokemon['Pokemon'],
                'description' => $pokemon['Description'],
                'type1' => $pokemon['Type 1'],
                'type2' => $pokemon['Type 2'],
                'hp' => $pokemon['HP'],
                'attack' => $pokemon['Attack'],
                'defense' => $pokemon['Defense'],
                'speed' => $pokemon['Speed'],
                'special' => $pokemon['Special'],
                'gif' => $pokemon['GIF'],
                'png' => $pokemon['PNG']
            ]);
        }
    }
}
