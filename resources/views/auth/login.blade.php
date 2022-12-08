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
            <h1 class="text-center">LOGIN</h1>
            <div class="sm-shadow card p-5 m-3">
                <form action="{{ route('login') }}" class="form-control" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Title" @error('name') is-invalid @enderror value="{{ old('name')}}">

                        @error('name')
                        <small class="text-danger">{{ $message}}</small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="" @error('email') is-invalid @enderror value="{{ old('email')}}">

                        @error('email')
                        <small class="text-danger">{{ $message}}</small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" @error('password') is-invalid @enderror value="{{ old('password')}}">

                        @error('password')
                        <small class="text-danger">{{ $message}}</small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" @error('"password_confirmation"') is-invalid @enderror value="{{ old('"password_confirmation"')}}">

                        @error('"password_confirmation"')
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
