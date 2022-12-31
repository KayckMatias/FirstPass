@extends('layouts.menu')

@section('title', $title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
                @endforeach
            </ul>
            @endif
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Password - #' . $password->id) }} -
                    <a href="{{ route('passwords.index') }}" title="Return Url"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Return</button></a>
                </div>
                <div class="card-body">
                    <form action="{{ route('passwords.update', [$password->id]) }}" method="post">
                        @csrf
                        @method("PATCH")
                        <input type="hidden" name="id" id="id" value="{{$password->id}}" id="id" />
                        <select placeholder="Bank" class="form-select" name="category_id" required>
                            <option value="">Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{($password->category_id == $category->id) ? 'selected' : ''}}>{{ $category->category_name }}</option>
                            @endforeach
                        </select></br>
                        <label>Name</label></br>
                        <input type="text" name="password_name" id="password_name" value="{{$password->password_name}}" class="form-control"></br>
                        <label>Password</label></br>
                        <input type="text" value="" class="form-control" disabled>
                        <small id="passwordPassHelp" class="form-text text-muted">For you security, the password as not editable, if you change or wrong the password, create a new password.</small></br>
                        <input type="submit" value="Edit" class="btn btn-success"></br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection