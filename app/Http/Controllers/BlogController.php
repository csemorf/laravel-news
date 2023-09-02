<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = Category::find(1);
        return $category->blogs;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required', 'integer'],
            'title' => ['required', 'max:255', 'min:2'],
            'body' => ['required'],
            'status' => ['required', 'boolean'],
            'image' => ['required', 'image', 'max:3000'],

        ]);

        $imagePath = $this->uploadFiles($request);

        $blog = new Blog();
        $blog->category_id = $request->category;
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->status = $request->status;
        $blog->image = $imagePath;

        $blog->save();
        session()->flash('success', 'your blog create successfully');

        return redirect()->back();
        // dd($request->all());
    }
    public function uploadFiles(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            return $imagePath = 'uploads/' . $imageName;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}