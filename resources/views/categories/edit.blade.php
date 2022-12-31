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
                    {{ __('Edit Category - #' . $category->id) }} -
                    <a href="{{ route('categories.index') }}" title="Return Url"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Return</button></a>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update', [$category->id]) }}" method="post">
                        @csrf
                        @method("PATCH")
                        <input type="hidden" name="id" id="id" value="{{$category->id}}" id="id" />
                        <label>Name</label></br>
                        <input type="text" name="category_name" id="category_name" value="{{$category->category_name}}" class="form-control"></br>
                        <input type="submit" value="Edit" class="btn btn-success"></br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection