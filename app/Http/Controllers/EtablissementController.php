<?php

namespace App\Http\Controllers;

use App\Etablissement;
use Illuminate\Http\Request;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etablissements = Etablissement::all();
        return view('layouts.etablissement.index', compact('etablissements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.etablissement.add');
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
            'intitule'=>'bail|required|string|max:255',
            'adresse'=>'bail|required|string|max:255',
            'url'=>'bail|required|string|max:255',
        ]);
        Etablissement::create([
            'intitule'=>$request['intitule'],
            'adresse'=>$request['adresse'],
            'url'=>$request['url'],
        ]);
        return view('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Etablissement  $etablissement
     * @return \Illuminate\Http\Response
     */
    public function show(Etablissement $etablissement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Etablissement  $etablissement
     * @return \Illuminate\Http\Response
     */
    public function edit(Etablissement $etablissement)
    {
        return view('layouts.etablissement.modify', compact('etablissement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Etablissement  $etablissement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etablissement $etablissement)
    {
        $request->validate([
            'intitule'=>'nullable|string|max:255',
            'adresse'=>'nullable|string|max:255',
            'url'=>'nullable|string|max:255',
        ]);
        if ($request->has('intitule')) {
            $etablissement->intitule = $request['intitule'];
        }
        if ($request->has('adresse')) {
            $etablissement->adresse = $request['adresse'];
        }
        if ($request->has('url')) {
            $etablissement->url = $request['url'];
        }
        $etablissement->save();
        return view('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Etablissement  $etablissement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etablissement $etablissement)
    {
        $etablissement->delete();
        return redirect()->back();
    }
}
