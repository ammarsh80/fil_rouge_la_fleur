<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-300 leading-tight">
            {{ __('list of all orders') }}

        </h2>
    </x-slot>
    <div class="py-12" id="container_index_commande">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-sm:p-0 flex flex-wrap p-6 text-gray-900 mb-0">

                    <div id="container_commande" style="width:50vw;">
                        <div class="mb-5 mt-5 flex flex-wrap flex-col justify-between p-2" style="border:1px solid lightblue; border-radius:8px;">
                            <div class="mb-3 p-2 flex flex-wrap justify-between" style="background-color: rgb(145, 169, 231); border-radius:8px;">
                                <div class="flex flex-wrap" style="background-color: rgb(145, 169, 231); border-radius:8px;">
                                    <span class="font-bold" style="width: 250px;">Numéro de commande : </span>
                                    <hr>
                                    <span class="mb-2"> {{$commandeClient->id}}</span>
                                </div>

                                <div>
                                    <span class="underline mr-3">État de commande: </span>
                                    <span class="font-bold mr-2 p-2 bg-green-300 rounded mb-1">{{$commandeClient->etat}}</span>

                                </div>
                            </div>

                            <div class="flex max-w-lg mb-3">
                                <span class="font-bold" style="width: 250px;">Nom et prénom : </span>
                                <span>{{$commandeClient->client->prenom}} {{$commandeClient->client->nom_client}}</span>

                            </div>

                            <!-- <div class="flex max-w-lg mb-3">
                                <span class="font-bold" style="width: 250px;">État de client : </span>
                                <span>{{$commandeClient->client->etat}}</span>

                            </div> -->

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
                            <!-- <div class="flex max-w-lg mb-3">
                                <span class="font-bold"  style="width: 250px;">Date de modification de quantité : </span>
                                <span> @foreach($commandeClient->article as $article)
                                        <span> {{$article->lignCommandeClient[0]->quantite_modifie_le}}</span>
                                    @endforeach
                                </span>
                            </div> -->

                            <div class="mb-3 flex max-w-2xl">
                                <span class="font-bold" style="width: 250px;">Livraison programée le :</span>
                                <span class="p-1 bg-green-300 rounded mb-1"> {{$commandeClient->date_livraison_progamme}}</span>
                            </div>

                            <div class="mb-3 flex max-w-4xl">
                                <span class="font-bold mr-7" style="width: 220px">Articles commandées: </span>
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
                                <span> {{ $commandeClient->gainLoterie ? $commandeClient->gainLoterie->lot : ''}}</span>
                            </div>



                            <div class="mb-3 flex max-w-2xl">
                                <span class="font-bold" style="width: 250px;">Adresse de livraison : </span>
                                <span>
                                    <p> {{ $adresseLivraison->rue }}</p>
                                    <p>{{ $adresseLivraison->complement_rue }}</p>
                                    <p> {{ $adresseLivraison->codePostal->code_postal }} {{ $adresseLivraison->ville->nom_ville }}</p>
                                </span>
                            </div>

                            <div class="mb-3 flex max-w-2xl">
                                <span class="font-bold" style="width: 250px;">Adresse de facturation : </span>
                                <span>
                                    <p> {{ $adresseFacturation->rue }}</p>
                                    <p>{{ $adresseFacturation->complement_rue }}</p>
                                    <p> {{ $adresseFacturation->codePostal->code_postal }} {{ $adresseFacturation->ville->nom_ville }}</p>
                                </span>
                            </div>

                            <div class="mb-3 flex max-w-2xl">
                                <span class="font-bold" style="width: 250px;">Livrée à temps : </span>
                                <span> {{ $commandeClient->livre_a_temps ? 'Oui' : 'Non' }}</span>
                            </div>
                        </div>
                        <div style="width:100%; padding-left:38%;">
                            <x-buttons.edit :action="route('commandeClients.edit', $commandeClient->id)"></x-buttons.edit>
                            <x-buttons.back :action="route('commandeClients.index')"></x-buttons.back>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>