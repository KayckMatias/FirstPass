@extends('layouts.menu')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Security Stats') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        100%
                    </div>
                </div>

                <h4 class="text-center" style="margin-top: 2.5rem;">Favorite Passwords</h4>

                <div class="row">
                    @forelse ($favorite_passwords as $password)
                        <div class="col-md-6 col-sm-12" style="margin-top: 0.5rem;">
                            <div class="card" style="width: auto;">
                                <div class="card-body text-center">
                                <h5 class="card-title">{{ $password->password_name }}</h5>
                                <p class="card-text">{{ $password->password_login }}</p>
                                <a href="{{ route('passwords.validate', [$password->id]) }}" class="btn btn-primary">View Password</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h6 class="text-center">No favorite passwords found :c </h6>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
