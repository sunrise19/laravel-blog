@extends('layouts.admin')

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
            <h1 class="text-center">BLOG FORM</h1>
            <div class="sm-shadow card p-5 m-3">
                <form action="{{ route('blog.store') }}" class="form-control" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" @error('title') is-invalid @enderror value="{{ old('title')}}">

                        @error('title')
                        <small class="text-danger">{{ $message}}</small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category_id" id="category" class="form-select">
                            <option >Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="" @error('slug') is-invalid @enderror value="{{ old('slug')}}">

                        @error('slug')
                        <small class="text-danger">{{ $message}}</small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea class="form-control" id="details" rows="3" name="details" @error('slug') is-invalid @enderror value="{{ old('details')}}"></textarea>

                        @error('details')
                        <small class="text-danger">{{ $message}}</small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" @error('image') is-invalid @enderror>

                        @error('image')
                        <small class="text-danger">{{ $message}}</small>
                        @enderror

                    </div>

                    <div class=" mb-3 w-100">
                        <button class="btn btn-outline-primary w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
