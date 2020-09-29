<?php

namespace App\Http\Controllers;

use App\Auteur;
use App\Etablissement;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auteurs = Auteur::all();
        return view('layouts.auteur.index', compact('auteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etablissements = Etablissement::all();
        return view('layouts.auteur.add', ['etablissements'=>$etablissements]);
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
            'nom'=>'bail|required|string|max:255',
            'prenom'=>'bail|required|string|max:255',
            'som'=>'bail|string|max:255',
            'etablissement_id'=>'bail|required|numeric',
        ]);
        Auteur::create([
            'nom'=>$request['nom'],
            'prenom'=>$request['prenom'],
            'som'=>$request['som'],
            'etablissement_id'=>$request['etablissement_id'],
        ]);
        return view('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Auteur $auteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Auteur $auteur)
    {
        $etablissements = Etablissement::all();
        return view('layouts.auteur.modify', ['etablissements'=>$etablissements, 'auteur'=> $auteur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auteur $auteur)
    {
        $request->validate([
            'nom'=>'nullable|string|max:255',
            'prenom'=>'nullable|string|max:255',
            'som'=>'nullable|string|max:255',
            'etablissement_id'=>'nullable|numeric',
        ]);
        if ($request->has('nom')) {
            $auteur->nom = $request['nom'];
        }
        if ($request->has('prenom')) {
            $auteur->prenom = $request['prenom'];
        }
        if ($request->has('som')) {
            $auteur->som = $request['som'];
        }
        if ($request->has('etablissement_id')) {
            $auteur->etablissement_id = $request['etablissement_id'];
        }
        $auteur->save();
        return view('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auteur $auteur)
    {
        $auteur->delete();
        return redirect()->back();
    }
}
