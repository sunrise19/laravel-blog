<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function store(Request $request){
        $input = $request->all();
        $validBlog = Validator::make($request->all(), [
            'title' => 'required|unique:blogs|max:255|min:5',
            'slug' => 'required|unique:blogs',
            'category_id' => 'required|exists:categories,id',
            'details' => 'required|min:10'
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
}
