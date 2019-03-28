@extends('layouts.app')

@section('content')

    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <a href="{{route('twitch_redirect')}}" class="btn btn-primary">Login with Twitch</a>

        </div>
    </div>



@endsection