@extends("layouts.app")
@section('content')
    <div class="container" >
        <div class="row" style="background-color: cornsilk">
        @if(Auth::check())
            <form method="post" action="{{!empty($data)? route('movie_update', $data->id): route('store_movies')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label> Select category</label><br>
                    <select name="category_id">

                        @foreach($categories as $category)
                            <option @isset($data) @if ($category->id == $data->category_id) selected @endif @endisset value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>
                </div><br>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{!empty($data) ? $data->name : ''}}" class="form-control" name="name">
                </div><br>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{!empty($data) ? $data->name : ''}}" class="form-control" name="name">
                </div><br>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" value="{{!empty($data) ? $data->description : ''}}" class="form-control" name="description">
                </div><br>
                <div class="form-group">
                    <label>Years</label>
                    <input type="number" value="{{!empty($data) ? $data->years : ''}}" class="form-control" name="years">
                </div><br>
                <div class="form-group">
                    <label>Rating</label>
                    <input type="text" class="form-control" value="{{!empty($data) ? $data->rating : ''}}" name="rating">
                </div><br>
                <button type="submit" class="btn btn-default">Submit</button>
            </form><br>
    </div><br><br><br>
        @endif
        @if(isset($data))
            <form method="post" enctype="multipart/form-data" action="{{route('movie_pic_upload', $data->id)}}">
                {{csrf_field()}}
                <input type="file" name="pic">
                <input type="submit">Upload
            </form><br>
        @endif
        <br>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                <strong>Sort by category </strong>
                <select name="category_id">
                    @foreach($categories as $category)
                        <option @isset($data) @if ($category->id == $data->category_id) selected @endif @endisset value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <tr>
                    <th><strong>Name</strong></th>
                    <th><strong>Image</strong></th>
                    <th><strong>Description</strong></th>
                    <th><strong>Years</strong></th>
                    <th><strong>Ratings</strong></th>
                    @if(Auth::check())
                        <th><strong>Options</strong></th>
                    @endif
                </tr>
                </thead>
                <tbody>

                @foreach($movies as $movie)
                    <tr>
                        <td>
                            <a href="{{route('single_movie', $movie->id)}}">{{$movie->name}}</a>
                        </td>
                        <td>
                            <a href="{{route('single_movie', $movie->id)}}"><img src="{{$movie->featureImage}}"></a>
                        </td>
                        <td value="{{$movie->id}}">{{$movie->description}}</td>
                        <td value="{{$movie->id}}">{{$movie->years}}</td>
                        <td value="{{$movie->id}}">{{$movie->rating}}</td>
                        @if(Auth::check())
                            <td>
                                <a href="{{route("movies_edit", $movie->id)}}" class="btn btn-warning">Edit</a>
                                <a href="{{route("movie_delete", $movie->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        @endif
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection