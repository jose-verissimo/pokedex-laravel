@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card card-full-width">
            <div class="card-header">
                <span>{{ __('Catch \'em all') }}</span>
            </div>

            <div class="card-body">
                <div class="mt-2 mb-3">
                    <h5 class="card-title">Wild pokemons appeared!</h5>
                    <p class="card-text">Click any pokemon to catch it.</p>
                </div>
                <pokemon-list :pokemon-inventory="{{ json_encode($pokemons) }}"></pokemon-list>
            </div>
        </div>
    </div>
@endsection
