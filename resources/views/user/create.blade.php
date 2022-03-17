@extends("layouts.mainLayout")
@section('title')
<title>Users | Create</title>
@endsection

@section('mainContent')
<div class="mt-4">
    <form action="/createUser" method="POST" >
        @csrf
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" @if(old('firstName')) value="{{old('firstName')}}" @endif>
            @error('firstName')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" @if(old('lastName')) value="{{old('lastName')}}" @endif>
            @error('lastName')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" @if(old('email')) value="{{old('email')}}" @endif>
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection