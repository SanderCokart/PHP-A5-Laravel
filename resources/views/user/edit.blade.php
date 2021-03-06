@extends('layouts.app')
@section('content')
    <div class="container">
        {{--EDIT FORM START--}}
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PATCH')

            <div class="form-row">
                {{--USERS' NAME EDIT START--}}
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name"
                           value="{{ old('name') ?? $user->name}}">
                    @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{--USERS' NAME EDIT END--}}
                {{--USERS' EMAIL EDIT START--}}
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email"
                           value="{{ old('email') ?? $user->email}}">
                    @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{--USERS' EMAIL EDIT END--}}
            </div>

            <button class="btn btn-primary w-100" type="submit">Update</button>

            {{--PASSWORD RESET--}}
            <a class="btn btn-danger w-100 mt-2" href="{{ route('password.request') }}">Reset Password</a>
        </form>
        {{--EDIT FORM END--}}
    </div>
@endsection
