@extends('layouts.auth')

@section('content')
<div id="main-container" class="container-fluid">
    <div class="row">
        <div id="auth-form" class="card border-primary">
            <h5 class="card-header bg-primary text-white">
                Login</h5>
            <div class="card-body">
                <form class="panel-body" method="POST" action="{{ route('login') }}">
                    @csrf
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
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection