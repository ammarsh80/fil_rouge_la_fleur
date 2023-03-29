<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="font-bold p-1 w-92 text-center bg-gray-300">Modifier l'article numéro {{$article->id}}</h1>

                    <div class="mt-5 flex flex-wrap justify-between items-center">
                        <div>

                            <form action="{{route('articles.update',$article->id)}}" method="POST">
                                @method ('PUT') @csrf
                                <div class="flex flex-col max-w-lg">
                                    <label for="nom_fleur" class="block text-sm font-bold text-gray-700">
                                        {{__('Title :')}}
                                    </label>
                                </div>
                                <select name="nom_fleur" id="nom_fleur" style="width: 220px;">
                                    <option value="{{$article->fleur->id}}">{{$article->fleur->nom_fleur}} </option>
                                    @foreach($fleurs as $fleur)
                                    <option value="{{$fleur->id}}">{{$fleur->nom_fleur}}</option>
                                    @endforeach
                                </select>
                                <!-- <input type="text" name="nom_fleur" value="{{$article->fleur['nom_fleur']}}" style="width: 220px;"> -->
                                @error('nom_fleur')
                                <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                @enderror
                        </div>
                        <div>
                            <form action="{{route('articles.update',$article->id)}}" method="POST">
                                @method ('PUT') @csrf
                                <div class="flex flex-col max-w-lg">
                                    <label for="etat" class="block text-sm font-bold text-gray-700">
                                        État (disponible, vendu ..etc.):
                                    </label>
                                </div>

                                <select name="etat" id="etat" style="width: 220px;">
                                    <option value="{{$article->etat}}">{{$article->etat}}</option>
                                    <option value="indisponible">indisponible</option>
                                    <option value="vendu">vendu</option>
                                    <option value="jete">jete</option>
                                </select>


                                @error('etat')
                                <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                @enderror
                        </div>
                        <div>
                            <form action="{{route('articles.update',$article->id)}}" method="POST">
                                @method ('PUT') @csrf
                                <div class="flex flex-col max-w-lg">
                                    <label for="quantite_stock" class="block text-sm font-bold text-gray-700">
                                        Quantité stockée :
                                    </label>
                                </div>
                                <input type="text" name="quantite_stock" value="{{$article->quantite_stock}}" style="width: 220px;">
                                @error('quantite_stock')
                                <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                @enderror
                        </div>
                        <div>
                            <div class="flex flex-col max-w-lg">
                                <label for="date_inventaire" class="block text-sm font-bold text-gray-700">
                                    {{__('Inventory date (optional) :')}}
                                </label>
                            </div>
                            <input type="datetime-local" name="date_inventaire" style="width: 220px;">
                        </div>


                        <!-- <?php
                                date_default_timezone_set('Europe/Paris');
                                ?>

                        <div>
                            <div class="flex flex-col max-w-lg">
                                <label for="date_inventaire" class="block text-sm font-bold text-gray-700">
                                    {{__('Inventory date (optional) :')}}
                                </label>
                            </div>
                            <input type="datetime-local" name="date_inventaire" value="{{ date('Y-m-d\TH:i:s') }}">
                        </div> -->

                    </div>
                    <div class="mt-5 flex flex-wrap justify-between items-center">

                        <div>
                            <form action="{{route('articles.update',$article->id)}}" method="POST">
                                @method ('PUT') @csrf
                                <div class="flex flex-col max-w-lg">
                                    <label for="prix_unitaire" class="block text-sm font-bold text-gray-700">
                                        {{__('Price :')}}
                                    </label>
                                </div>
                                <input type="text" name="prix_unitaire" value="{{$article->prix_unitaire}}" style="width: 220px;">
                                @error('prix_unitaire')
                                <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                @enderror
                        </div>

                        <div>
                            <div class="flex flex-col max-w-lg ml-2">
                                <label for="nombre" class="block text-sm font-bold text-gray-700">
                                    {{__('Quantity (ex: 1, 2 ..etc) :')}}
                                </label>
                            </div>
                            <input type="text" name="nombre" value="{{$article->nombre}}" style="width: 220px;">
                            @error('nombre')
                            <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="couleur" class="font-bold">Couleur (optionnelle) :</label>
                            <select name="couleur" id="couleur" style="width: 220px;">
                                <!-- <option value="{{$article->couleur ? $article->couleur['couleur'] : ''}}"> {{ $article->couleur ? $article->couleur['couleur'] : '' }} </option> -->

                                @foreach($couleurs as $couleur)
                                <option value="{{$couleur->id}}">{{$couleur->couleur}}</option>
                                @endforeach
                            </select>
                            @error('couleur')
                            <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                            @enderror
                        </div>
                        <div>

                            <div class="flex flex-col max-w-lg">
                                <label for="nom_unite" class="block text-sm font-bold text-gray-700">
                                    {{__('Détail (tige, grammes..etc) :')}}
                                </label>
                            </div>

                            <select name="nom_unite" id="nom_unite" style="width: 220px;">
                                <option value="{{$article->unite->id}}">{{$article->unite->nom_unite}} {{$article->unite->taille}}</option>

                                @foreach($unites as $unite)
                                <option value="{{$unite->id}}">{{$unite->nom_unite}} {{$unite->taille}}</option>
                                @endforeach
                            </select>


                            <!-- <input type="text" name="nom_unite" value="{{$article->unite->nom_unite}}" style="width: 220px;"> -->
                            @error('nom_unite')
                            <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="mt-5 flex flex-wrap justify-between items-center p-2" style="background-color: lightblue;">


                        <div>
                            <div class="flex flex-col max-w-lg">
                                <label for="categorie" class="block text-sm font-bold text-gray-700">
                                    Cétégorie :
                                </label>
                            </div>


                            <select name="categorie" id="categorie">

                                <option value="">Sélectionner une catégorie </option>
                                @foreach($categories as $categorie)
                                <option value="{{$categorie->id}}">{{$categorie->nom_categorie}}</option>
                                @endforeach
                            </select>

                            @error('categorie')
                            <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="p-6 text-gray-900">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-10">
                                {{ __('Liste des catégories auxquelles appartient cet article :') }}
                            </h2>
                            <!-- @method('PUT') -->
                            @csrf
                            <ul class="flex">
                                @foreach($article->categorie as $categorie)
                                <li class="m-2 text-xl bg-orange-200 p-2 rounded-lg">
                                    <a href="{{route('articles.detach', [$article->id, $categorie->id])}}">{{$categorie->nom_categorie}}
                                        <svg fill="none" stroke="red" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="inline-block h-6 mb-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                        </svg>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        
                        <div>
                            <div class="flex flex-col max-w-lg">
                                <label for="evenement" class="block text-sm font-bold text-gray-700">
                                    Évènement (optionnel):
                                </label>
                            </div>

                            <select name="evenement" id="evenement">
                                <option value="">Sélectionner un évènement </option>
                                @foreach($evenements as $evenement)
                                <option value="{{$evenement->id}}">{{$evenement->nom_evenement}}</option>
                                @endforeach
                            </select>

                            @error('evenement')
                            <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="p-6 text-gray-900">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-10">
                                {{ __('Liste des évènements auxquels appartient cet article :') }}
                            </h2>
                            <!-- @method('PUT') -->
                            @csrf
                            <ul class="flex">
                                @foreach($article->evenement as $evenement)
                                <li class="m-2 text-xl bg-orange-200 p-2 rounded-lg">
                                    <a href="{{route('articles.detachEven', [$article->id, $evenement->id])}}">{{$evenement->nom_evenement}}
                                        <svg fill="none" stroke="red" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="inline-block h-6 mb-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                        </svg>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>



                    <div class="flex flex-wrap flex-col">

                        <label for="description" class="py-3 font-bold">Description (optionnelle) :</label>
                        <textarea name="description" id="description">{{$article->description}}</textarea>
                        @error('description')
                        <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <x-buttons.save :action="route('articles.update', $article->id)"></x-buttons.save>
                        <x-buttons.cancel :action="route('articles.index')"></x-buttons.cancel>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>