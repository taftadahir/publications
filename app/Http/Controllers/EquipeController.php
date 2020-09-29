<?php

namespace App\Http\Controllers;

use App\Auteur;
use App\Equipe;
use App\Laboratoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipes = Equipe::all();
        return view('layouts.equipe.index', compact('equipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laboratoires = Laboratoire::all();
        $responsables = Auteur::all();
        $auteurs = Auteur::all();
        return view('layouts.equipe.add', ['laboratoires'=>$laboratoires, 'responsables'=>$responsables, 'auteurs'=>$auteurs]);
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
            'nom_equipe'=>'bail|required|string|max:255',
            'laboratoire_id'=>'bail|required|numeric',
            'responsable'=>'bail|required|numeric',
            'auteurs'=>'array|nullable',
        ]);
        $equipe = Equipe::create([
            'nom_equipe'=>$request['nom_equipe'],
            'laboratoire_id'=>$request['laboratoire_id'],
            'responsable'=>$request['responsable'],
        ]);
        foreach ($request['auteurs'] as $auteur_id) {
            $article_auteur = DB::select('select * from auteur_equipe where auteur_id = ? && equipe_id = ?', [$auteur_id,$equipe->id]);
            if (count($article_auteur) == 0) {
                if ($auteur_id!=0) {
                    DB::insert('insert into auteur_equipe (auteur_id, equipe_id) values (?, ?)', [$auteur_id, $equipe->id]);
                }
            }
        }
        return view('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Equipe $equipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipe $equipe)
    {
        $laboratoires = Laboratoire::all();
        $responsables = Auteur::all();
        return view('layouts.equipe.modify', ['equipe'=>$equipe,'laboratoires'=>$laboratoires, 'responsables'=>$responsables]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipe $equipe)
    {
        $request->validate([
            'nom_equipe'=>'nullable|string|max:255',
            'laboratoire_id'=>'nullable|numeric',
            'responsable'=>'nullable|numeric',
        ]);
        if ($request->has('nom_equipe')) {
            $equipe->nom_equipe = $request['nom_equipe'];
        }
        if ($request->has('laboratoire_id')) {
            $equipe->laboratoire_id = $request['laboratoire_id'];
        }
        if ($request->has('responsable')) {
            $equipe->responsable = $request['responsable'];
        }
        foreach ($request['auteurs'] as $auteur_id) {
            $article_auteur = DB::select('select * from auteur_equipe where auteur_id = ? && equipe_id = ?', [$auteur_id,$equipe->id]);
            if (count($article_auteur) == 0) {
                if ($auteur_id!=0) {
                    DB::insert('insert into auteur_equipe (auteur_id, equipe_id) values (?, ?)', [$auteur_id, $equipe->id]);
                }
            }else{
                
            }
        }
        $equipe->save();
        return view('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipe $equipe)
    {
        $equipe->delete();
        return redirect()->back();
    }
}
