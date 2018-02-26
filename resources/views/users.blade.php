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
                        <form method="post" action="{{ route('change_role', $user->id) }}">
                            {{csrf_field()}}
                            <select onChange="this.form.submit()" name="change_role">
                                <option {{ $user->role == "admin" ? 'selected' : '' }} value="admin">Admin</option>
                                <option {{ $user->role == "user" ? 'selected' : '' }} value="user">User</option>
                            </select>
                        </form>
                    </td>
                    <td>cia bus delete</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
