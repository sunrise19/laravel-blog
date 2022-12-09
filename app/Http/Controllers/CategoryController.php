<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::paginate();
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
            // dd($request->input('title'), $request->fullUrl());
            // dd($request->input('title'), $request->ip());
            $valid = $request->validate([
                'name' => 'required|unique:categories|max:255|min:5',
                'slug' => 'required|unique:categories',
                // 'details' => 'required|min:10'
            ]);

            // dd($valid['slug']);
            $slug = Str::slug($valid['slug'], '-');
            Category::create(array_merge($valid, ['slug'=> $slug]));
            // return redirect()->back()->with('message', 'Category Created');
            return redirect()->back()->withInput($request->input())->with('message', 'Category Created'); //leaves the information on the field if an error is thrown
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // dd($blog);
        return view('categories.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
         // dd($blog);
        // dd($slug);

        $valid = $request->validate([
            'name' => ['required', 'max:255', 'min:5'],
            'slug' => ['required', Rule::unique('categories')->ignore($category)]
        ]);

        // dd($valid['slug']);
        $slug = Str::slug($valid['slug'], '-');
        $category->update(array_merge($valid, ['slug'=> $slug]));
        return redirect()->back()->with('message', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
