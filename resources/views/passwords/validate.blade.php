@extends('layouts.auth')

@section('content')
    <div id="main-container" class="container-fluid">
        <div class="row">
            <div id="auth-form" class="card border-primary">
                <h5 class="card-header bg-primary text-white">
                    Confirm PIN</h5>
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert {{ Session::get('alert_type') }}" role="alert">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <form class="panel-body" method="POST" action="{{ route('passwords.validation') }}">
                        @csrf
                        <input type="hidden" id="password_id" name="password_id" value="{{ $password_id }}">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                            <input type="password" id="pin_password" name="pin_password"
                                class="form-control @error('pin_password') is-invalid @enderror" placeholder="PIN">
                            @error('pin_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Verify</button>
                    </form>
                    <div class="panel-body" style="margin-top: 10px">
                        <a href="{{ route('passwords.index') }}"><button class="btn btn-secondary">Return to Passwords</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
