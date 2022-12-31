@extends('layouts.auth')

@section('content')
<div id="main-container" class="container-fluid">
    <div class="row">
        <div id="auth-form" class="card border-primary register-form">
            <h5 class="card-header bg-primary text-white">
                Register</h5>
            <div class="card-body">
                <form class="panel-body" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>

                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" pattern="[0-9]*" inputmode="numeric" min="6" max="6" id="pin_password" name="pin_password" class="form-control @error('pin_password') is-invalid @enderror" placeholder="PIN">
                        <small id="pin_passwordHelp" class="form-text text-muted">ATTENTION: THIS PIN IS NOT CHANGEABLE AND IS NECESSARY TO VIEW YOUR PASSWORDS, <strong>DO NOT LOSE IT!</strong></small>
                        @error('pin_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection