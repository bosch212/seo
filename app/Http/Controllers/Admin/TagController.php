<?php

namespace App\Http\Controllers\Admin;

use App\Tags;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tags::all();

        return view ('pages.admin.tags.index', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pages.admin.tags.create');
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
            'name' => 'required',
        ], [
            'name.required' => 'name is required | min:3 character',
        ]);

        $tag = Tags::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Disimpan');

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
        $tag = Tags::findOrFail($id);

        return view ('pages.admin.tags.edit', compact('tag'));
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
        $request->validate([
            'name' => 'required',            
        ], [
            'name.required' => 'name is required | min:3 character',        
        ]);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $tag_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];
        
        Tags::whereId($id)->update($tag_data);        

        return redirect()->route('tag.index')->with('success', 'Data Berhasil DI Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag_data = Tags::findOrFail($id);

        $tag_data->delete();

        return redirect()->route('tag.index');

    }
}
