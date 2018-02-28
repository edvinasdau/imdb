    @extends("layouts.app")
    @section('content')
        @if(Auth::check())
    <form method="post" action="{{!empty ($data) ? route('actors_update', $data->id): route('store_actor')}}">
        {{ csrf_field() }}
        <div class="form-group">
          <label>Name</label>
          <input type="text" value="{{!empty($data) ? $data->name : ''}}" class="form-control" name="name">
        </div><br>
        <div class="form-group">
          <label>Birthday</label>
          <input type="text" class="form-control" value="{{!empty($data) ? $data->birthday : ''}}" name="birthday">
        </div><br>
        <div class="form-group">
            <label>Deathday</label>
            <input type="text" value="{{!empty($data) ? $data->deathday : ''}}" class="form-control" name="deathday">
        </div><br>
        <div class="form-group">
            <label>Starring in:</label>
        <select class="js-example-basic-multiple" name="movies[]" multiple="multiple">

            @foreach($movies as $movie)
                <option value="{{$movie->id}}">{{$movie->name}}</option>
            @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form><br>
        @endif
    @if(isset($data))
    <form method="post" enctype="multipart/form-data" action="{{route('actor_pic_upload', $data->id)}}">
        {{csrf_field()}}
        <input type="file" name="pic">
        <input type="submit">Upload
    </form><br>
    @endif
        <div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-condensed">
            <thead>
            <tr>
                <th><strong>Name</strong></th>
                <th><strong>Image</strong></th>
                <th><strong>Birthday</strong></th>
                <th><strong>Deathday</strong></th>
                <th><strong></strong></th>
            </tr>
            </thead>
            <tbody>

            @foreach($actors as $actor)
                <tr>
                    <td>
                        <a href="{{route('single_actor', $actor->id)}}">{{$actor->name}}</a>
                    </td>
                    <td>
                        <a href="{{route('single_actor', $actor->id)}}"> <img src="{{$actor->featureImage}}"></a>
                    </td>
                    <td value="{{$actor->id}}">{{$actor->birthday}}</td>
                    <td value="{{$actor->id}}">{{$actor->deathday}}</td>
                    @if(Auth::check())
                     <td>
                         <a href="{{route("actors_edit", $actor->id)}}" class="btn btn-warning">Edit</a>
                         <a href="{{route("actors_delete", $actor->id)}}" class="btn btn-danger">Delete</a>
                     </td>
                    @endif
                </tr>
            @endforeach

            </tbody>
        </table>
        </div>
        </div>
        @endsection