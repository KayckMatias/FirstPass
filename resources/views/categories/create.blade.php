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
                    {{ __('Create Category') }} -
                    <a href="{{ route('categories.index') }}" title="Return Url"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Return</button></a>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <label>Name</label></br>
                        <input type="text" name="category_name" id="category_name" class="form-control"></br>
                        <input type="submit" value="Create" class="btn btn-success"></br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection