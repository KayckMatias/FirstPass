@extends('layouts.auth')

@section('content')
    <div class="form-signin w-300 m-auto text-center">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Register</h1>

            <div class="form-floating mb-1">
                <input type="text" id="name" name="name"
                    class="form-control rounded @error('name') is-invalid @enderror" placeholder="Name" required>
                <label for="name">Name</label>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating mb-1">
                <input type="email" class="form-control rounded @error('email') is-invalid @enderror" id="email"
                    name="email" placeholder="name@example.com" required>
                <label for="email">Email address</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating mb-1">
                <input type="password" class="form-control rounded @error('password') is-invalid @enderror" id="password"
                    name="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating mb-1">
                <input type="password" class="form-control rounded @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                <label for="password_confirmation">Confirm Password</label>
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" pattern="[0-9]*"
                    class="form-control rounded @error('pin_password') is-invalid @enderror" id="pin_password"
                    name="pin_password" placeholder="PIN Password" required>
                <label for="pin_password">PIN Password</label>
                <small id="pin_passwordHelp" class="form-text text-muted">ATTENTION: THIS PIN IS NOT CHANGEABLE AND IS
                    NECESSARY TO VIEW YOUR PASSWORDS, <strong>DO NOT LOSE IT!</strong></small>
                @error('pin_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        </form>
    </div>
@endsection
