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
                    {{ __('Create Password') }} -
                    <a href="{{ route('passwords.index') }}" title="Return Url"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Return</button></a>
                </div>
                <div class="card-body">
                    <form action="{{ route('passwords.store') }}" method="post">
                        @csrf
                        <label>Categories</label></br>
                        <select placeholder="Category type" class="form-select" name="category_id" required>
                            <option value="">Select a Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select></br>

                        <label>Name</label></br>
                        <input type="text" name="password_name" id="password_name" class="form-control" required></br>

                        <label>Login Info (optional, e-mail, username, etc)</label></br>
                        <input type="text" name="password_login" id="password_login" class="form-control"></br>

                        <label>Password</label></br>
                        <input type="text" name="password_pass" id="password_pass" class="form-control" required></br>

                        <label>Favorite?</label>
                        <input type="checkbox" name="is_favorite" value="1" style="margin-bottom: 1.5rem;"></br>

                        <input type="submit" value="Create" class="btn btn-success"></br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection