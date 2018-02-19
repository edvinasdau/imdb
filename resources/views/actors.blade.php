@extends("layouts.app")
@section('content')
<form method="post" action="{{route('store_actor')}}">
    {{ csrf_field() }}
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name">
    </div><br>
    <div class="form-group">
      <label>Birthday</label>
      <input type="text" class="form-control" name="birthday">
    </div><br>
    <div class="form-group">
        <label>Deathday</label>
        <input type="text" class="form-control" name="deathday">
    </div><br>

    <button type="submit" class="btn btn-default">Submit</button>
</form>
    @endsection