@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1 class="text-center">{{ $blog->title }}</h1>
            <div class="col-md-4 col-lg-4">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel veniam impedit deserunt quis iure dolorum nemo
                at maxime, nesciunt qui dolore odit id beatae quae minima harum. Dolores, labore a? Lorem ipsum dolor sit
                amet consectetur, adipisicing elit. Voluptatibus doloremque possimus autem tempore nulla. Aut, laborum
                molestiae maiores ullam minima tempora. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates
                nemo sed dicta sapiente impedit alias ducimus velit quod, inventore nulla totam neque. Voluptate a hic
                provident minus doloribus tempore commodi.
            </div>
            <div class="col-md-4 col-lg-4">
                Rerum neque nesciunt ut dolorem et reiciendis, itaque rem. Lorem ipsum dolor sit amet consectetur
                adipisicing elit. In temporibus ea reprehenderit neque quia dicta eum quos placeat accusamus quasi
                veritatis, voluptate laudantium necessitatibus deleniti quas nihil voluptatem esse sunt! Lorem ipsum dolor
                sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates
                nemo sed dicta sapiente impedit alias ducimus velit quod, inventore nulla totam neque. Voluptate a hic
                provident minus doloribus tempore commodi.
            </div>
            <div class="col-md-4 col-lg-4">
                Natus quo quisquam vero facilis sit corrupti ducimus harum enim et ipsum cumque eos culpa, minus laboriosam
                nam! Repellendus reprehenderit dolorem iusto! Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Quaerat exercitationem laborum et voluptatibus eius, enim saepe similique placeat quam perspiciatis culpa
                itaque asperiores id molestiae assumenda temporibus in nostrum? Harum. Lorem ipsum, dolor sit amet
                consectetur adipisicing elit. Voluptates nemo sed dicta sapiente impedit alias ducimus velit quod, inventore
                nulla totam neque. Voluptate a hic provident minus doloribus tempore commodi.
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4 offset-md-4">
            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-outline-info">Edit Post</a>
            <a href="{{ route('blog.destroy', $blog->id) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete')">Delete Post</a>
            </div>

        </div>
    </div>
@endsection
