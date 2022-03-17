@extends("layouts.mainLayout")
@section('title')
<title>Users</title>
@endsection

@section('mainContent')
@if (session('success'))
<div class="alert alert-success mt-5">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger mt-5">
    {{ session('error') }}
</div>
@endif
<div class="mt-3 mb-2 d-flex align-items-end flex-column">
    <a href="{{ url('/new-user') }}" class="btn btn-success btn-sm">+ New User</a>
</div>
<div class="mt-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userList as $item)
            <tr>
                <td>{{$item->firstName." ".$item->lastName}}</td>
                <td>{{$item->email}}</td>
                <td><a href="{{ url('edit-user/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection