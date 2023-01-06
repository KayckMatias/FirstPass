@extends('layouts.auth')

@section('content')
    <div class="form-signin w-100 m-auto text-center">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <div class="form-floating mb-1">
                <input type="email" class="form-control rounded @error('email') is-invalid @enderror" id="email" name="email"
                    placeholder="name@example.com" required>
                <label for="email">Email address</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control rounded @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        </form>
    </div>
@endsection
