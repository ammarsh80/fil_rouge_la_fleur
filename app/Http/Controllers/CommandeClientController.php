<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\CommandeClient;
use Illuminate\Http\Request;

class CommandeClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $commandeClient = CommandeClient::with(['client', 'article'])->get();
    return view('commandeClients.index', ['commandeClients' => $commandeClient]);  
  }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commandeClient = CommandeClient::find($id);
        $adresseLivraison = $commandeClient->adresseLivraison;
        $adresseFacturation = $commandeClient->adresseFacturation;
    
        return view('commandeClients.show', [
            'commandeClient' => $commandeClient,
            'adresseLivraison' => $adresseLivraison,
            'adresseFacturation' => $adresseFacturation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $commandeClient = CommandeClient::find($id);
        $adresse_Livraison = $commandeClient->adresseLivraison;
   return view('commandeClients.edit', ['commandeClient' => $commandeClient], ['adresse_Livraison' => $adresse_Livraison]);     

    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->validate([
            'etat_commande' => "string",
            'livree_temps' => "string",
        ])) {
            $commandeClient = CommandeClient::find($id);
            
            $etat_commande = $request->input('etat_commande');
            $commandeClient->etat = $etat_commande;
            
            $livree_temps = $request->input('livree_temps');
            $commandeClient->livre_a_temps = $livree_temps;
        

            $commandeClient->save();
            return redirect()->route('commandeClients.show', $commandeClient->id);
        } else {
            return redirect()->back();
        }     
     }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CommandeClient::destroy($id);
        return redirect()->route('commandeClients.index'); 
    }
}
