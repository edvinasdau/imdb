@extends("layouts.app")
@section('content')
<form method="post" action="{{route('store_actor')}}">
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

    <button type="submit" class="btn btn-default">Submit</button>
</form><br><br>

<div class="table-responsive">
    <table class="table table-striped table-hover table-condensed">
        <thead>
        <tr>
            <th><strong>Name</strong></th>
            <th><strong>Birthday</strong></th>
            <th><strong>Deathday</strong></th>
            <th><strong></strong></th>
        </tr>
        </thead>
        <tbody>

        @foreach($actors as $actor)
            <tr>
                <td value="{{$actor->id}}">{{$actor->name}}
                </td>
                <td value="{{$actor->id}}">{{$actor->birthday}}</td>
                <td value="{{$actor->id}}">{{$actor->deathday}}</td>
                 <td><a class="btn btn-warning">Edit</a>
                    <a class="btn btn-danger">Delete</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
    @endsection