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
        <input type="text" class="form-control" name="years">
    </div><br>
    <div class="form-group">
        <label>Rating</label>
        <input type="text" class="form-control" name="rating">
    </div><br>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
    @endsection