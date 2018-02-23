@extends("layouts.app")
@section('content')
<form method="post" action="{{!empty($data)? route('movie_update', $data->id): route('store_movies')}}">
    {{ csrf_field() }}
    <div class="form-group">
<select name="category_id">
    <label>Categories</label>
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
        <tr>
            <th><strong>Name</strong></th>
            <th><strong>Image</strong></th>
            <th><strong>Description</strong></th>
            <th><strong>Years</strong></th>
            <th><strong>Ratings</strong></th>
            <th><strong>Options</strong></th>
        </tr>
        </thead>
        <tbody>

        @foreach($movies as $movie)
            <tr>
                <td value="{{$movie->id}}">{{$movie->name}}</td>
                <td>
                    <img src="{{$movie->featureImage}}">
                </td>
                <td value="{{$movie->id}}">{{$movie->description}}</td>
                <td value="{{$movie->id}}">{{$movie->years}}</td>
                <td value="{{$movie->id}}">{{$movie->rating}}</td>
                <td><a href="{{route("movies_edit", $movie->id)}}" class="btn btn-warning">Edit</a>
                    <a href="{{route("movie_delete", $movie->id)}}" class="btn btn-danger">Delete</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
    @endsection