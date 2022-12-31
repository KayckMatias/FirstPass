@extends('layouts.menu')

@section('title', $title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('message'))
            <div class="alert {{ Session::get('alert_type') }}" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    {{ __('Categories') }} -
                    <a href="{{ route('categories.create') }}" title="Create Category"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Create</button></a>
                </div>
                <div class="card-body">
                    <div class="search-group">
                        <form action="{{ route('categories.search') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="search" name="search_categories" value="{{ (Str::contains(Request::route()->getName(), 'search')) ? $search : '' }}" class="form-control" />
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table id="categories_table" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->category_name }}</td>

                                    <td>
                                        <a href="{{ route('categories.edit', [$item->id]) }}" title="Edit Category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                        <form method="POST" action="{{ route('categories.destroy', [$item->id]) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Category" onclick="return confirm('Delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection