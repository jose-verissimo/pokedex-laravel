@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card card-full-width">
            <div class="card-header">
                <span>{{ __('Catch \'em all') }}</span>
            </div>

            <div class="card-body">
                <pokemon-list :pokemons="{{ json_encode($pokemons) }}"></pokemon-list>
            </div>
        </div>
    </div>
@endsection
