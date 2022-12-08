<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class FrontController extends Controller
{
    // public function index(){
    //     return 'Index page';
    // }

    // public function about(){
    //     return 'About page';
    // }



    public function index(){

        // $blogs = Blog::all();
        $blogs = Blog::paginate(5);
        // dd($blogs);
        return view('index')->with(['blogs' => $blogs]);
    }

    public function contact(){
        return 'Contact us here';
    }

    public function show($slug){
        // return $slug;
        $blog = Blog::where('slug', $slug)->firstOrFail();
        // dd($blog);
        return view('blog', ['blog' => $blog]);
    }
}
