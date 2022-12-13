@extends('layouts.app ')

@section('content')
<div class="container-fluid">
<h1 class="text-center display-4">Blog Posts</h1>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus qui repudiandae optio aperiam eos facilis suscipit magnam perspiciatis, enim perferendis deserunt consequatur eaque voluptas, vitae eligendi rerum id. Eius, harum.
</div>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

          {{-- alert --}}
          @if (session()->has('message'))
          <div class="alert alert-success">
              {{ session()->get('message') }}
          </div>
      @endif

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($blogs as $blog)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{ asset('storage/'.$blog->image)}}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">
                                {{ $blog->title}}
                            </h5>
                            <span>
                                Category:
                                @if ($blog->category !=null)
                                {{$blog->category->name}}
                                @endif
                            </span>
                            <span>
                                {{$blog->slug}}
                            </span>
                            <p>

                            </p>
                            <!-- Product price-->
                                {{$blog['details']}}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto" href="{{ route('blog.show', $blog->slug)}}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {!! $blogs->links() !!}
        </div>
    </div>
</section>
@endsection
