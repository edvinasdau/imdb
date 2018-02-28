@extends("layouts.app")
@section('content')
    <div class="container">
        <div class="row">
            <h1 value="{{$movie->id}}">{{$movie->name}}</h1><br>
            <div class="col-sm-4 flex-center position-ref full-height">
                <img style="height: 100%; width: 100%;" src="{{$movie->featureImage}}">
            </div>
            <div class="col-sm-4 flex-center position-ref full-height">
                <h4>{{$movie->description}}</h4>
            </div>
            <div class="col-sm-4 flex-center position-ref full-height">
                <h2>Starring:</h2>
                <h3>
                    @foreach($actors as $actor)
                            <a href="{{route('single_actor', $actor->id)}}"><img style="height: 10%; width: 10%;" src="{{$actor->featureImage}}">{{$actor->name}}<br><br> </a>
                    @endforeach
                </h3>
            </div>

        </div>
    </div>
@endsection
