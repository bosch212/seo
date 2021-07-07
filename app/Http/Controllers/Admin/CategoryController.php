<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return view ('pages.admin.category.index', compact('category'));
    }

    public function create()
    {
        return view ('pages.admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',            
        ], [
            'name.required' => 'name is required | min:3 character',        
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $category = Category::findorFail($id);

        return view ('pages.admin.category.edit', compact('category'));
    }

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

        $category_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];
        
        Category::whereId($id)->update($category_data);        

        return redirect()->route('category-index')->with('success', 'Data Berhasil DI Ubah');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('category-index');
    }
}
