<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="font-bold p-1 w-92 text-center bg-gray-300" style="border-radius:8px 8px 0 0;">Modifier l'article numéro {{$article->id}}</h1>

                    <div class="mt-5 flex flex-wrap justify-between items-center p-2" style="background-color: rgb(145, 169, 231); border-radius:8px;">
                        <div>
                            <div class="flex flex-col max-w-lg">
                                <label for="categorie" class="block text-xs font-bold text-gray-700">
                                    Ajouter une catégorie :
                                </label>
                            </div>
                            <ul class="flex flex-wrap">
                                @foreach($categories as $categorie)
                                <a href="{{route('articles.attachCategorie', [$article->id, $categorie->id])}}">
                                    <li class="m-2 text-xs bg-red-100 p-1 rounded-lg ajout_categorie">
                                        <svg class="svg-circleplus" viewBox="0 0 100 100" style="height: 20px; stroke: green;">
                                            <circle cx="50" cy="50" r="45" fill="none" stroke-width="7.5"></circle>
                                            <line x1="32.5" y1="50" x2="67.5" y2="50" stroke-width="8"></line>
                                            <line x1="50" y1="32.5" x2="50" y2="67.5" stroke-width="8"></line>
                                        </svg>
                                        {{$categorie->nom_categorie}}
                                    </li>
                                </a>

                                @endforeach
                            </ul>
                        </div>
                        <div>

                            <h2 class="font-semibold text-xs text-gray-800 leading-tight mt-0">
                                {{ __('Liste des catégories auxquelles appartient cet article :') }}
                            </h2>


                            <ul class="flex flex-col">
                                @foreach($article->categorie as $categorie)
                                <a href="{{route('articles.detachCat', [$article->id, $categorie->id])}}">
                                    <li class="m-2 text-xs bg-green-300 p-1 rounded-lg supprime_categorie">
                                        <svg fill="none" stroke="red" stroke-width="1.2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="inline-block h-6 mb-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                        </svg>

                                        {{$categorie->nom_categorie}}
                                    </li>
                                </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>



                    <div class="mt-5 flex flex-wrap justify-between items-center p-2" style="background-color: rgb(145, 169, 231); border-radius:8px;">
                        <div>
                            <div class="flex flex-col max-w-lg">
                                <label for="categorie" class="block text-xs font-bold text-gray-700">
                                    Ajouter un évènement :
                                </label>
                            </div>
                            <ul class="flex flex-wrap">
                                @foreach($evenements as $evenement)
                                <a href="{{route('articles.attachEvenement', [$article->id, $evenement->id])}}">
                                    <li class="m-2 text-xs bg-red-100 p-2 rounded-lg ajout_categorie">
                                        <svg class="svg-circleplus" viewBox="0 0 100 100" style="height: 20px; stroke: green;">
                                            <circle cx="50" cy="50" r="45" fill="none" stroke-width="7.5"></circle>
                                            <line x1="32.5" y1="50" x2="67.5" y2="50" stroke-width="8"></line>
                                            <line x1="50" y1="32.5" x2="50" y2="67.5" stroke-width="8"></line>
                                        </svg>
                                        {{$evenement->nom_evenement}}
                                    </li>
                                </a>
                                @endforeach
                            </ul>
                        </div>
                        <div>

                            <h2 class="font-semibold text-xs text-gray-800 leading-tight mt-0">
                                {{ __('Liste des évènements auxquels appartient cet article :') }}
                            </h2>


                            <ul class="flex flex-col">
                                @foreach($article->evenement as $evenement)
                                <a href="{{route('articles.detachEven', [$article->id, $evenement->id])}}">
                                    <li class="m-2 text-xs bg-green-300 p-1 rounded-lg supprime_categorie">
                                        <svg fill="none" stroke="red" stroke-width="1.2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="inline-block h-6 mb-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                        </svg>
                                        {{$evenement->nom_evenement}}
                                    </li>
                                </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>

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
                                    <option value="disponible">disponible</option>
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

                    </div>
                    <div class="mt-5 mb-5 flex flex-wrap justify-between items-center">

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
                                    {{__('Quantity (ex: 1, 10, 300 ..etc) :')}}
                                </label>
                            </div>
                            <input type="text" name="nombre" value="{{$article->nombre}}" style="width: 220px;">
                            @error('nombre')
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

                            @error('nom_unite')
                            <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="couleur" class="font-bold">Couleur (optionnelle) :</label>
                            <select name="couleur" id="couleur" style="width: 220px;">
                                <option value="{{$article->couleur->id}}">{{$article->couleur->couleur}}</option>

                                @foreach($couleurs as $couleur)
                                <option value="{{$couleur->id}}">{{$couleur->couleur}}</option>
                                @endforeach
                            </select>
                            @error('couleur')
                            <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                            @enderror
                        </div>
                    </div>



                    <div class="flex flex-wrap justify-around">
                        <div class="flex flex-wrap flex-col">

                            <label for="description" class="font-bold">Description (optionnelle) :</label>
                            <textarea name="description" id="description" class="h-32" style="width:40vw;">{{$article->description}}</textarea>
                            @error('description')
                            <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                            @enderror
                        </div>

                        <!-- <div class="flex flex-wrap flex-col py-1">
                            <form action="{{route('articles.store')}}" method="POST">
                                @csrf
                                <div class="flex flex-col max-w-lg">
                                    <label for="image" class="block text-sm font-bold text-gray-700">
                                        {{__('Saisir le nom de fichier image (ex: fleur.jpg) ')}}
                                    </label>
                                </div>
                                <input type="text" name="image" style="width: 290px;" value="{{$article->image}}">
                                @error('image')
                                <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                @enderror
                        </div> -->



                        <form method="POST" action="/upload" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group" style="padding-top:60px ;">
                                <label for="image">Télécharger une image</label>
                                <input type="file" name="image" id="image" class="form-control-file">
                                @error('image')
                                <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                @enderror
                            </div>

                    </div>
                    <div>
                        <x-buttons.save :action="route('articles.update', $article->id)"></x-buttons.save>
                        <x-buttons.cancel :action="route('articles.index')"></x-buttons.cancel>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>