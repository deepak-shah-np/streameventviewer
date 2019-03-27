@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Home</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif




                        <div class="col-sm-12">
                            <form action="{{ url("/home") }}" method="get" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q"
                                           placeholder="Favourite streamer name" value="{{$query}}"> <span class="input-group-btn">
                                    <button type="submit" class="btn btn-info">   Search</button>


                    </span>
                                </div>
                            </form>
                        </div>
                        <hr>

                        <div class="row">
                            @if(!empty($query))


                                @if(sizeof($results) >0)
                                    @foreach($results as $data)
                                        <div class="col-sm-4 mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <iframe class="" src="https://player.twitch.tv/?channel={{$data['channel']['display_name']}}&autoplay=false" height="350" width="100%" frameborder="0" scrolling="no" allowfullscreen="false">
                                                    </iframe>
                                                    <p>
                                                        <a href="{{route('stream_detail',['streamid'=>$data['channel']['_id']])}}" class="btn btn-link">{{$data['channel']['display_name']}}</a></p>

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach

                                @else

                                @endif
                            @else
                                @if(!empty($results))
                                    @foreach($results->data as $data)
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <iframe class="mb-10"
                                                            src="https://player.twitch.tv/?channel={!!$data->to_name!!}&autoplay=false"
                                                            height="350" width="100%" frameborder="0" scrolling="no"
                                                            allowfullscreen="false">
                                                    </iframe>
                                                    <a href="{{route('stream_detail',['streamid'=>$data->to_id])}}" class="btn btn-link">{!! $data->to_name !!}</a>

                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach

                                @else
                                    <div class="col-sm-12">
                                        <div class="alert alert-info">
                                            No data found.
                                        </div>
                                    </div>
                                @endif

                            @endif

                        </div>

                        <hr>

                    </div>
                </div>
            </div>

        </div>
@endsection
