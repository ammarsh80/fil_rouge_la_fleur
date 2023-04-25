<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-300 leading-tight">
            {{ __('list of all orders') }}

        </h2>
    </x-slot>
    <div class="py-12" id="container_index_commande">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-sm:p-0 flex flex-wrap p-6 text-gray-900">

                    <div id="container_commande" style="width:50vw;">
                        <div class="mb-5 mt-5 flex flex-wrap flex-col justify-between p-2" style="border:1px solid lightblue; border-radius:8px;">
                            <div class="mb-3 p-2 flex flex-wrap justify-between" style="background-color: rgb(145, 169, 231); border-radius:8px;">
                                <div class="flex flex-wrap" style="background-color: rgb(145, 169, 231); border-radius:8px;">
                                    <span class="font-bold" style="width: 250px;">Numéro de commande : </span>
                                    <hr>
                                    <span> {{$commandeClient->id}}</span>
                                </div>


                                <div>
                                    <form action="{{route('commandeClients.update',$commandeClient->id)}}" method="POST">
                                        @method ('PUT') @csrf
                                        <div class="flex">

                                            <div class="max-w-lg">
                                                <label for="etat_commande" class="mr-2 block text-sm font-bold text-gray-700">
                                                    État de commande:
                                                </label>
                                            </div>

                                            <select name="etat_commande" id="etat_commande" style="width: 180px;">
                                                <option value="{{$commandeClient->etat}}">{{$commandeClient->etat}}</option>
                                                <option value="payée">payée</option>
                                                <option value="enregistrée">enregistrée</option>
                                                <option value="validée">validée</option>
                                                <option value="en cours de livraison">en cours de livraison</option>
                                                <option value="livrée">livrée</option>
                                                <option value="annulée">annuler</option>

                                            </select>
                                        </div>
                                        @error('etat_commande')
                                        <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                        @enderror
                                </div>

                            </div>

                            <div class="flex max-w-lg mb-3">
                                <span class="font-bold" style="width: 250px;">Nom et prénom : </span>
                                <span>{{$commandeClient->client->prenom}} {{$commandeClient->client->nom_client}}
                                </span>
                            </div>

                            <div class="flex max-w-lg mb-3">
                                <span class="font-bold" style="width: 250px;">État de client : </span>


      <!-- <select name="etat_client" id="etat_client" style="width: 180px;">
                                    <option value="{{$commandeClient->client->etat}}">{{$commandeClient->client->etat}}</option>
                                    <option value="wait">wait</option>
                                    <option value="blocked">blocked</option>
                                    

                                </select>
                            @error('etat_client')
                            <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                            @enderror -->                         


                            <span>{{$commandeClient->client->etat}} </span> 
                        </div>

                        <div class="flex max-w-lg mb-3">
                            <span class="font-bold" style="width: 250px;">Numéro de portable : </span>
                            <span> {{$commandeClient->client->telephone}}
                            </span>
                        </div>

                        <div class="flex max-w-lg mb-3">
                            <span class="font-bold" style="width: 250px;">E-mail : </span>
                            <span> {{$commandeClient->client->email}}
                            </span>
                        </div>

                        <div class="flex max-w-lg mb-3">
                            <span class="font-bold" style="width: 250px;">Date de commande: </span>
                            <span> {{$commandeClient->commande_le}}
                            </span>
                        </div>

                        <div class="flex max-w-lg mb-3">
                            <span class="font-bold" style="width: 250px;">Date de modification : </span>
                            <span> {{$commandeClient->modifier_le}}
                            </span>
                        </div>

                        <div class="mb-3 flex max-w-2xl">
                            <span class="font-bold" style="width: 250px;">Livraison programée le :</span>
                            <span> {{$commandeClient->date_livraison_progamme}}</span>
                        </div>

                        <div class="mb-3 flex max-w-4xl">
                            <span class="font-bold mr-7" style="width: 220px;">Articles commandées: </span>
                            <span> @foreach($commandeClient->article as $article)
                                <p class="p-2 bg-green-500 rounded mb-1">
                                    <a href="{{route('articles.show', $article->id)}}">
                                        - {{$article->fleur->nom_fleur}}
                                        {{$article->couleur->couleur}}
                                        {{$article->nombre}}
                                        {{$article->unite->nom_unite}}
                                        {{$article->unite->taille}}, <br>
                                        <span class="text-red-700"> &#215 {{$article->lignCommandeClient[0]->quantite}}</span>
                                    </a></li>
                                </p>
                                @endforeach
                            </span>
                        </div>

                        <div class="mb-3 flex max-w-2xl">
                            <span class="font-bold" style="width: 250px;">Lot gagné : </span>
                            <span>{{ $commandeClient->gainLoterie ? $commandeClient->gainLoterie->lot : ''}}</span>
                        </div>

                        <div class="mb-3 flex max-w-2xl">
                            <span class="font-bold" style="width: 250px;">Adresse de livraison : </span>
                            <span>
                                <p> {{ $adresse_Livraison->rue }}</p>
                                <p>{{ $adresse_Livraison->complement_rue }}</p>
                                <p> {{ $adresse_Livraison->codePostal->code_postal }} {{ $adresse_Livraison->ville->nom_ville }}</p>
                            </span>
                        </div>


                        <div class="flex">
                            <form action="{{route('commandeClients.update',$commandeClient->id)}}" method="POST">
                                @method ('PUT') @csrf
                                <div class="flex flex-col max-w-lg" style="width:250px;">
                                    <label for="livree_temps" class="block text-sm font-bold text-gray-700">
                                        Livrée à temps
                                    </label>
                                </div>

                                <select name="livree_temps" id="livree_temps">
                                    <option value="{{ $commandeClient->livre_a_temps}}">{{ $commandeClient->livre_a_temps ? 'Oui' : 'Non' }}</option>
                                    <option value="1">Oui</option>
                                    <option value="0">Non</option>

                                </select>
                                @error('livree_temps')
                                <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                @enderror
                        </div>
                    </div>
                    <div style="width:100%; padding-left:38%;">
                        <x-buttons.save :action="route('commandeClients.update', $commandeClient->id)"></x-buttons.save>
                        <x-buttons.back :action="route('commandeClients.index')"></x-buttons.back>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>