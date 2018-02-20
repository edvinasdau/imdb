@extends("layouts.app")
@section('content')
<form method="post" action="{{route('store_category')}}">
    {{ csrf_field() }}
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" value="{{!empty($data) ? $data->name : ''}}" name="name">
    </div>
    <div class="form-group">
      <label>Description</label>
      <input type="text" class="form-control" value="{{!empty($data) ? $data->description : ''}}" name="description">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form><br><br>

    <div class="table-responsive">
    <table class="table table-striped table-hover table-condensed">
        <thead>
        <tr>
            <th><strong>Name</strong></th>
            <th><strong>Description</strong></th>
            <th><strong></strong></th>
        </tr>
        </thead>
        <tbody>

            @foreach($categories as $category)
            <tr>
                <td value="{{$category->id}}">{{$category->name}}</td>
                <td value="{{$category->id}}">{{$category->description}}</td>
                   <td> <a href="{{route("category_edit", $category->id)}}" class="btn btn-warning">Edit</a>
                        <a href="{{route("category_delete", $category->id)}}" class="btn btn-danger">Delete</a>
                   </td>
            </tr>
             @endforeach
        </tbody>
    </table>
</div>
    @endsection
