@extends("layouts.app")
@section('content')
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
