<?php

namespace App\Http\Controllers;

use App\Article;
use App\Auteur;
use App\Imports\ArticlesImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('layouts.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.article.add', ['auteurs'=>Auteur::all()]);
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
            'titre'=>'bail|required|string',
            'genre'=>'bail|required|string|max:255',
            'date_publication'=>'bail|date',
            'url'=>'bail|required|string|max:255',
            'auteurs'=>'array|nullable',
        ]);
        $article = Article::create([
            'titre'=>$request['titre'],
            'genre'=>$request['genre'],
            'date_publication'=>$request['date_publication'],
            'url'=>$request['url'],
        ]);
        foreach ($request['auteurs'] as $auteur_id) {
            $article_auteur = DB::select('select * from auteur_article where auteur_id = ? && article_id = ?', [$auteur_id,$article->id]);
            if (count($article_auteur) == 0) {
                if ($auteur_id!=0) {
                    DB::insert('insert into auteur_article (auteur_id, article_id) values (?, ?)', [$auteur_id, $article->id]);
                }
            }
        }

        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCsv(Request $request)
    {
        $request->validate([
            'file_csv'=>'required|file|mimes:xls,xlsx,csv',
        ]);
        $path = $request->file('file_csv')->getRealPath();

        if ($request->has('header')) {
            $data = Excel::load($path, function($reader) {})->get()->toArray();
        } else {
            $data = array_map('str_getcsv', file($path));
        }
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
        return view('layouts.article.modify', ['auteurs'=>Auteur::all(), 'article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'titre'=>'nullable|string',
            'genre'=>'nullable|string|max:255',
            'date_publication'=>'nullable|date',
            'url'=>'nullable|string|max:255',
        ]);
        if ($request->has('titre')) {
            $article->titre = $request['titre'];
        }
        if ($request->has('genre')) {
            $article->genre = $request['genre'];
        }
        if ($request->has('date_publication')) {
            $article->date_publication = $request['date_publication'];
        }
        if ($request->has('url')) {
            $article->url = $request['url'];
        }

        foreach ($request['auteurs'] as $auteur_id) {
            $article_auteur = DB::select('select * from auteur_article where auteur_id = ? && article_id = ?', [$auteur_id,$article->id]);
            if (count($article_auteur) == 0) {
                if ($auteur_id!=0) {
                    DB::insert('insert into auteur_article (auteur_id, article_id) values (?, ?)', [$auteur_id, $article->id]);
                }
            }
        }

        $article->save();
        return view('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back();
    }
}
