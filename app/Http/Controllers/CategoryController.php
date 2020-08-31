<?php

namespace App\Http\Controllers;

use App\Category;
use Alert;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Yajra\Datatables\Datatables;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('panel.categori.index',compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('panel.categori.create', ['category' => new Category()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $attr = $request->all();
        
        $slug = \Str::slug(request('name'));
        $attr['slug'] = $slug;

        Category::create($attr);

        Alert::toast('Kategori berhasil ditambahkan','success')->timerProgressBar();
        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // $articles = $category->article()->paginate(6);
        // dd($articles);
        // return view('beranda', compact('category','articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('panel.categori.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $attr = $request->all();

        $category->update($attr);

        Alert::toast('Kategori berhasil diupdate','success')->timerProgressBar();
        return redirect('/category');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {   
        
        $categoryId = Category::find($id);
        $categoryId->delete();

        Alert::toast('Kategori berhasil dihapus','success')->timerProgressBar();
        return back();
    }
}
