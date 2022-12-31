@extends('layouts.menu')

@section('title', $title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
            @endforeach

            @if(Session::has('message'))
            <div class="alert {{ Session::get('alert_type') }}" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <form action="{{ route('profile.update', [$user->id]) }}" method="post">
                        @csrf
                        @method("PATCH")
                        <input type="hidden" name="id" id="id" value="{{$user->id}}" id="id" />
                        <label>Name</label></br>
                        <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <label>E-mail</label></br>
                        <input type="mail" name="email" id="email" value="{{$user->email}}" class="form-control">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <label>Password</label></br>
                        <input type="password" name="password" id="password" value="" class="form-control">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <input type="submit" value="Atualizar" class="btn btn-success"></br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection