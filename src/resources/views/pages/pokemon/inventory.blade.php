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

                <pokemon-list :pokemons="{{ json_encode($pokemonInventory) }}" :have-catched="true"></pokemon-list>

                <div class="{{ count($pokemonInventory) > 0 ? 'd-none' : 'mt-4'}}">
                    <h5 class="card-title">No pokemon!</h5>
                    <p class="card-text">Find some pokemons out in the wild, <a href="{{ route('catchEmAll') }}">here</a>.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
