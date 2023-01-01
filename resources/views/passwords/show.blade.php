@extends('layouts.menu')

@section('title', $title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Password - #' . $password->id) }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-product">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $password->password_name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Login Info</strong></td>
                                    <td><strong>{{ $decrypted_login ?? 'No login info' }}</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Password</strong></td>
                                    <td><strong>{{ $decrypted_pass ?? 'No decrypted' }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{ $password->category->category_name }}</td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>{{ $password->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Updated At</td>
                                    <td>{{ $password->updated_at }}</td>
                                </tr>
                                <tr>
                                    <td>Actions</td>
                                    <td>
                                        <a href="{{ route('passwords.index') }}" title="Edit Password"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Return</button></a>
                                        <a href="{{ route('passwords.edit', [$password->id]) }}" title="Edit Password"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        <form method="POST" action="{{ route('categories.destroy', [$password->id]) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Password" onclick="return confirm('Delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection