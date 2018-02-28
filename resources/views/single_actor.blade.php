@extends("layouts.app")
@section('content')
    <div class="container">
        <div class="row">
            <h1 value="{{$actor->id}}">{{$actor->name}}</h1><br>
            <div class="col-sm-6 flex-center position-ref full-height">
                <img style="height: 50%; width: 50%;" src="{{$actor->featureImage}}">
            </div>
            <div class="col-sm-6 flex-center position-ref full-height">
                <h2>Movies:</h2><br>
                <h3>
                    @foreach($movies as $movie)
                        <a href="{{route('single_movie', $movie->id)}}"><img style="height: 10%; width: 10%;" src="{{$movie->featureImage}}">{{$movie->name}}<br><br> </a>
                    @endforeach
                </h3>
            </div>

        </div>
    </div>
@endsection
