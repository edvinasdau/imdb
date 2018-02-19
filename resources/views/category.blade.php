@extends("layouts.app")
@section('content')
<form method="post" action="{{route('store_category')}}">
    {{ csrf_field() }}
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
      <label>Description</label>
      <input type="text" class="form-control" name="description">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
    @endsection