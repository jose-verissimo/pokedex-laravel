@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card card-full-width">
            <div class="card-header">
                <span>{{ __('Dashboard') }}</span>
            </div>

            <div class="card-body">
                <div class="pokemon-container">
                    @foreach ($pokemons as $pokemon)
                        <div>
                            <div class="pokemon-card">
                                <div class="pokemon-card-type">{{ $pokemon->type1 }}</div>
                                <div class="pokemon-card-image">
                                    <img src="{{ $pokemon->png }}" class="pokemon-card-png" alt="{{ $pokemon->name }} photo">
                                    <img src="{{ $pokemon->gif }}" class="pokemon-card-gif" alt="{{ $pokemon->name }} gif photo">
                                </div>

                                <h4>{{ $pokemon->name }}</h4>
                                <div class="pokemon-card-hp progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $pokemon->hp }}%" aria-valuenow="{{ $pokemon->hp }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
