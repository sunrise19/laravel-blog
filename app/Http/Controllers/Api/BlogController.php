<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{

    public function index(){

        // $blogs = Blog::all();
        $blogs = Blog::all();
        if(!$blogs->count()>0){
            return response()->json([
                'status' => true,
                'message' => 'No Blog In This Application',
            ], 200);
        }
        return response()->json([
            'status' => true,
            'blogs' => $blogs
        ]);
    }
    public function store(Request $request){
        $input = $request->all();
        $validBlog = Validator::make($request->all(), [
            'title' => 'required|unique:blogs|max:255|min:5',
            'slug' => 'required|unique:blogs',
            'category_id' => 'required|exists:categories,id',
            'details' => 'required|min:10',
        ]);

        if($validBlog->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validBlog->errors()
            ], 401);
        }
        $slug = Str::slug($input['slug'], '-');

        Blog::create(array_merge($input, ['slug'=> $slug]));
        // return redirect()->back()->with('message', 'Post Created');
        return response()->json([
            'status' => true,
            'message' => 'Post Created Successfully',
        ], 200);
    }

    public function update(Request $request, $id){
        // dd($blog);
        // dd($slug);
        $input = $request->all();
        $blog = Blog::findOrFail($id);

        $validBlog = Validator::make($request->all(), [
            'title' => ['required', 'max:255', 'min:5'],
            'slug' => ['required', Rule::unique('blogs')->ignore($blog)],
            'category_id' => 'required|exists:categories,id',
            'details' => ['required', 'min:10']
        ]);

        if($validBlog->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validBlog->errors()
            ], 401);
        }

        // dd($valid['slug']);
        $slug = Str::slug($input['slug'], '-');
        $blog->update(array_merge($input, ['slug'=> $slug]));
        return response()->json([
            'status' => true,
            'message' => 'Post Updated Successfully',
        ], 200);
    }

    public function show($id){
        // return $slug;
        $blog = Blog::find($id);
        // dd($blog);
        if($blog==null){
            return response()->json([
                'status' => true,
                'message' => 'No Such Blog In This Application',
            ], 200);
        }
        return response()->json([
            'status' => true,
            'blog' => $blog
        ]);
    }

    public function destroy($id){
        $blog = Blog::find($id);

        if($blog==null){
        return response()->json([
            'status' => true,
            'message' => 'No Such Blog In This Application',
        ], 200);
    }

    $blog->delete();
    return response()->json([
        'status' => true,
        'message' => 'Blog Deleted Successfully',
    ], 200);
    }
}
