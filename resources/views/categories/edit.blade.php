@extends('layouts.app')

@section('posts')


    <div class="row mt-5">

        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif


        {{-- error handling messages on top of the page --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div class="col-md-6 offset-md-3">
            <h1 class="text-center">EDIT CATEGORY</h1>
            <div class="sm-shadow card p-5 m-3">
                <form action="{{ route('categories.update', $blog->id)}}" class="form-control" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name" @error('name') is-invalid @enderror value="{{$blog->name}}">

                        @error('name')
                        <small class="text-danger">{{ $message}}</small>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="" @error('slug') is-invalid @enderror value="{{$blog->slug}}">

                        @error('slug')
                        <small class="text-danger">{{ $message}}</small>
                        @enderror

                    </div>

                    <div class=" mb-3 w-100">
                        <button type="submit" class="btn btn-outline-primary w-100">Edit Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
