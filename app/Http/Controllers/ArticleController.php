<?php

namespace App\Http\Controllers;

use App\{Article, Category, Tag};
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        $articles = $article->all();
        return view('panel.artikel.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('panel.artikel.create',
                    [
                        'article' => new Article(),
                        'categories' => Category::get(),
                        'tags' => Tag::get(),
                    ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $attr = request()->all();
        
        $slug  = \Str::slug(request('title'));
        $attr['slug'] = $slug;

        $article = Article::create($attr);

        $article->tags()->attach(request('tag'));

        Alert::toast('Artikel berhasil ditambahkan','success')->timerProgressBar();
        return redirect('/artikel/my-artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('panel.artikel.edit', [
            'article' => $article,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $attr = $request->all();

        $slug = \Str::slug(request('title'));
        $attr['slug'] = $slug;
        $attr['category_id'] = request('category_id');

        $article->update($attr);

        Alert::toast('Artikel berhasil diupdate','success')->timerProgressBar();
        return redirect('/artikel/my-artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article,$id)
    {
        $articleId = Article::find($id);
        $articleId->delete();

        Alert::toast('Artikel berhasil dihapus','success')->timerProgressBar();
        return redirect('/artikel/my-artikel');
    }
}
