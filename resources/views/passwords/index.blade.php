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
                    {{ __('Passwords') }} -
                    <a href="{{ route('passwords.create') }}" title="Create Category"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Create</button></a>
                </div>
                <div class="card-body">
                    <div class="search-group">
                        <form action="{{ route('passwords.search') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="search" name="search_passwords" value="{{ (Str::contains(Request::route()->getName(), 'search')) ? $search : '' }}" class="form-control" />
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
                                    <th>Categoria</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($passwords as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->password_name }}</td>
                                    <td>{{ $item->category->category_name }}</td>
                                    <td>
                                        <a href="{{ route('passwords.validate', [$item->id]) }}" title="Validate Password"><button class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ route('passwords.edit', [$item->id]) }}" title="Edit Password"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                        <form method="POST" action="{{ route('passwords.destroy', [$item->id]) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Password" onclick="return confirm('Delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex">
                        {{ $passwords->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection