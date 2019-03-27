@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$streamerName}}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <iframe class="mb-20" src="https://player.twitch.tv/?channel={{$streamerName}}&autoplay=false" height="330" width="50%" frameborder="0" scrolling="no" allowfullscreen="false">
                                </iframe>
                                <iframe style="float: right;" src="https://www.twitch.tv/embed/{{$streamerName}}/chat" frameborder="0" scrolling="no" height="330" width="50%"></iframe>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-12"> <hr> <h2> List of 10 Events </h2> <hr></div>

                            @if(!empty($response->data))
                                @foreach($response->data as $res)
                                    <div class="col-sm-6">
                                        <iframe src="https://player.twitch.tv/?autoplay=false&video=v{{ substr($res->url,strrpos($res->url, '/') + 1) }}" frameborder="0" allowfullscreen="true" scrolling="no" height="350" width="100%"></iframe>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-sm-6">
                                    <p> Sorry, There is no record here, Please try another one streamer.</p>
                                </div>

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
