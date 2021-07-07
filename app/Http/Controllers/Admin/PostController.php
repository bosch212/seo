<?php

namespace App\Http\Controllers\Admin;

use App\Tags;
use App\Posts;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Posts::all();

        return view('pages.admin.posts.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::all();
        $category = Category::all();

        return view('pages.admin.posts.create', compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required'
        ], [
            'judul.required' => 'Judul is required | min:6 character',
            'category_id.required' => 'Category_id is required',
            'content.required' => 'Content is required | min:6 character',
            'gambar.required' => 'Gambar is required | min: png,jpg',
        ]);

        if($request->hasFile('gambar')){
            $filenameWithExt = $request->file('gambar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtention();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $path = $request->file('gambar')->storeAs('public/posts_gambar', $filenameSimpan);
        } else{
            $filenameSimpan = 'noimage.jpg';
        }

        $post = Posts::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => $filenameSimpan,
            'slug' => Str::slug($request->judul)
        ]);

        $post->tags()->attach($request->tags);

        return redirect()->back()->with('success', 'Postingan anda berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $tags = Tags::all();
        $post = Posts::findOrFail($id);

        return view ('pages.admin.posts.edit', compact('category', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
