@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card card-full-width">
            <div class="card-header">
                <span>{{ __('Copyright') }}</span>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-8 offset-2">
                        <p>Inspired by <a target="_blank" href="https://dribbble.com/shots/2841457-Pokemon-GO-Desktop-Application">Austin Robinson Dribble</a></p>
                        <p>Data from <a target="_blank" href="https://gist.githubusercontent.com/santiagoolivar2017/0591a53c4dd34ecd8488660c7372b0e3/raw/4be104b8bc8876acd15f8e21f1c5945f10e3aa1e/Pokemon-description-image.csv">this gist</a></p>
                        <p>Other assets from <a target="_blank" href="https://github.com/apavlinovic/pokemon-go-imagery">apavlinovic/pokemon-go-imagery</a></p>
                        <p>Other code added developed by <a target="_blank" href="https://joseverissimo.com">José Veríssimo</a> excluding frameworks like Bootstrap, Vue and Laravel</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
