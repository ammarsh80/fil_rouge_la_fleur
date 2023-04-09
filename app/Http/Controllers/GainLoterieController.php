<?php

namespace App\Http\Controllers;

use App\Models\GainLoterie;
use Illuminate\Http\Request;

class GainLoterieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gainLoteries = GainLoterie::orderBy('id', 'asc')->get();
        return view('gainLoteries.index', ['gainLoteries' => $gainLoteries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gainLoterie = new GainLoterie();
        return view('gainLoteries.create', ['gainLotery' => $gainLoterie, 'titre' => $gainLoterie]);     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'nouveau_lot' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",
            'nouvelle_quantite' => "int|min:1|max:9999|"

        ])) {

            $nouveau_lot = $request->input('nouveau_lot');
            $nouvelle_quantite = $request->input('nouvelle_quantite');
            $lot = new GainLoterie();
            $lot->lot = $nouveau_lot;
            $lot->quantite_disponible = $nouvelle_quantite;
            $lot->save();
            return redirect()->route('gainLoteries.index');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gainLoterie = GainLoterie::find($id);
        return view('gainLoteries.edit', compact('gainLoterie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->validate([
            'nouveau_lot' => "required|string|min:3|max:45|regex:/[a-zA-Z][a-zA-Z0-9À-ÿ]*('[a-zA-Z0-9À-ÿ]+)*/",
            'nouvelle_quantite' => "int|min:1|max:9999|"
        ])) {
            $lot = GainLoterie::find($id);

            $nouveau_lot = $request->input('nouveau_lot');
            $lot->lot = $nouveau_lot;

            $nouvelle_quantite = $request->input('nouvelle_quantite');
            $lot->quantite_disponible = $nouvelle_quantite;
            $lot->save();
            return redirect()->route('gainLoteries.index', $lot->id);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        GainLoterie::destroy($id);
        return redirect()->route('gainLoteries.index');
    }
}
