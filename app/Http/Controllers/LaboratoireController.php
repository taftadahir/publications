<?php

namespace App\Http\Controllers;

use App\Auteur;
use App\Etablissement;
use App\Laboratoire;
use Illuminate\Http\Request;

class LaboratoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratoires = Laboratoire::all();
        return view('layouts.laboratoire.index', compact('laboratoires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etablissements = Etablissement::all();
        $directeurs = Auteur::all();
        return view('layouts.laboratoire.add',['etablissements'=>$etablissements, 'directeurs'=>$directeurs]);
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
            'nom_laboratoire'=>'bail|required|string|max:255',
            'etablissement_id'=>'bail|required|numeric',
            'directeur_labo'=>'bail|required|numeric',
        ]);
        Laboratoire::create([
            'nom_laboratoire'=>$request['nom_laboratoire'],
            'etablissement_id'=>$request['etablissement_id'],
            'directeur_labo'=>$request['directeur_labo'],
        ]);
        return view('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laboratoire  $laboratoire
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratoire $laboratoire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laboratoire  $laboratoire
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratoire $laboratoire)
    {
        $etablissements = Etablissement::all();
        $directeurs = Auteur::all();
        return view('layouts.laboratoire.modify', ['etablissements'=>$etablissements, 'directeurs'=>$directeurs,'laboratoire'=>$laboratoire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laboratoire  $laboratoire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratoire $laboratoire)
    {
        $request->validate([
            'nom_laboratoire'=>'nullable|string|max:255',
            'etablissement_id'=>'nullable|numeric',
            'directeur_labo'=>'nullable|numeric',
        ]);
        if ($request->has('nom_laboratoire')) {
            $laboratoire->nom_laboratoire = $request['nom_laboratoire'];
        }
        if ($request->has('etablissement_id')) {
            $laboratoire->etablissement_id = $request['etablissement_id'];
        }
        if ($request->has('directeur_labo')) {
            $laboratoire->directeur_labo = $request['directeur_labo'];
        }
        $laboratoire->save();
        return view('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laboratoire  $laboratoire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratoire $laboratoire)
    {
        $laboratoire->delete();
        return redirect()->back();
    }
}
