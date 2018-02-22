@extends("layouts.app")
@section('content')
    <div class="container-fluid">
        <div class="col">
            <div style="background-color: yellow" class="row">
                <h1>Create new user</h1><br>
                <a class="btn btn-success">Create new user</a
            </div>
        </div>
    </div><br><br><br>
    <div class="container">
        <h2>Registered users</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td value="{{$user->id}}">{{$user->name}}</td>
                    <td value="{{$user->id}}">{{$user->email}}</td>
                    <td>
                        <form action="">
                            <input type="radio" name="status" value="admin"> Admin<br>
                            <input type="radio" name="status" value="user"> User<br>
                            <input type="radio" name="status" value="guest"> Guest
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
