@extends("layouts.mainLayout")
@section('title')
<title>Users | Edit</title>
@endsection

@section('mainContent')
<div class="mt-4">
    @if (session('error'))
    <div class="alert alert-danger mt-5">
        {{ session('error') }}
    </div>
    @endif
    <div class="mt2 mb-3">
        <a href="/" class="btn btn btn-outline-secondary">
            < back</a>
    </div>
    <form action="/updateUser/{{$user->id}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" @if(old('firstName')) value="{{old('firstName')}}" @else value="{{$user->firstName}}" @endif>
            @error('firstName')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" @if(old('lastName')) value="{{old('lastName')}}" @else value="{{$user->lastName}}" @endif>
            @error('lastName')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" @if(old('email')) value="{{old('email')}}" @else value="{{$user->email}}" @endif>
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>

@endsection