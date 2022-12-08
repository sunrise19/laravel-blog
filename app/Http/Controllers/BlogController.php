<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        // dd($request->input('title'), $request->fullUrl());
        // dd($request->input('title'), $request->ip());
        $valid = $request->validate([
            'title' => 'required|unique:blogs|max:255|min:5',
            'slug' => 'required|unique:blogs',
            'details' => 'required|min:10'
        ]);

        // dd($valid['slug']);
        $slug = Str::slug($valid['slug'], '-');
        Blog::create(array_merge($valid, ['slug'=> $slug]));
        // return redirect()->back()->with('message', 'Post Created');
        return redirect()->back()->withInput($request->input())->with('message', 'Post Created'); //leaves the information on the field if an error is thrown
    }

    public function edit($id){
        $blog = Blog::findOrFail($id);
        // dd($blog);
        return view('posts.edit', ['blog'=>$blog]);
    }

    public function update(Request $request, $id){
        // dd($blog);
        // dd($slug);
        $blog = Blog::findOrFail($id);

        $valid = $request->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'slug' => ['required', Rule::unique('blogs')->ignore($blog)],
            'details' => ['required', 'min:10']
        ]);

        // dd($valid['slug']);
        $slug = Str::slug($valid['slug'], '-');
        $blog->update(array_merge($valid, ['slug'=> $slug]));
        return redirect()->back()->with('message', 'Post Updated');
    }

    public function destroy($id){
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('home')->with('message', 'Post Deleted');
    }
}