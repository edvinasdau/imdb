@extends("layouts.app")
@section('content')
<form method="post" action="{{route('store_movies')}}">
    {{ csrf_field() }}
    <div class="form-group">
<select name="category_id">
    <label>Categories</label>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
</select>
    </div><br>
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name">
    </div><br>
    <div class="form-group">
      <label>Description</label>
      <input type="text" class="form-control" name="description">
    </div><br>
    <div class="form-group">
        <label>Years</label>
        <input type="number" class="form-control" name="years">
    </div><br>
    <div class="form-group">
        <label>Rating</label>
        <input type="text" class="form-control" name="rating">
    </div><br>
    <button type="submit" class="btn btn-default">Submit</button>
</form><br><br>

<div class="table-responsive">
    <table class="table table-striped table-hover table-condensed">
        <thead>
        <tr>
            <th><strong>Name</strong></th>
            <th><strong>Description</strong></th>
            <th><strong>Years</strong></th>
            <th><strong>Ratings</strong></th>
            <th><strong></strong></th>
        </tr>
        </thead>
        <tbody>

        @foreach($movies as $movie)
            <tr>
                <td value="{{$movie->id}}">{{$movie->name}}</td>
                <td value="{{$movie->id}}">{{$movie->description}}</td>
                <td value="{{$movie->id}}">{{$movie->years}}</td>
                <td value="{{$movie->id}}">{{$movie->ratings}}</td>
                <td><a href="{{route("movies_edit", $movie->id)}}" class="btn btn-warning">Edit</a>
                    <a class="btn btn-danger">Delete</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
    @endsection