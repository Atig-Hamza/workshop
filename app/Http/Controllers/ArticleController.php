<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->user_id = 1;
        $article->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->save();

        return redirect('/')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/')->with('success', 'Article deleted successfully');
    }

    /**
     * Search for articles by title.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::where('title', 'like', "%{$query}%")->get();

        if ($articles->isEmpty()) {
            return redirect('/')->with('error', 'No articles found');
        }

        return response()->json($articles);
    }

}
