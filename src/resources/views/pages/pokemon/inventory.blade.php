@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card card-full-width">
            <div class="card-header">
                <span>{{ __('Dashboard') }}</span>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}

                @foreach ($pokemons as $pokemon)
                    {{ $pokemon->name }}<br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
