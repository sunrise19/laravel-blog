@extends('layouts.app')


@section('posts')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3 my-5">
                <h1 class="text-center mb-5">CATEGORIES</h1>
                <table class="table table-striped table-sm table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td><a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-outline-primary">Edit Category</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
