@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card card-full-width">
            <div class="card-header">
                <span>{{ __('Inventory') }}</span>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
                
                <pokemon-list :pokemons="{{ json_encode($pokemonInventory) }}" :have-catched="true"></pokemon-list>
            </div>
        </div>
    </div>
@endsection
