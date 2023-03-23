<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="font-bold p-2 w-72 text-center bg-gray-300">Modifier l'article numéro {{$article->id}}</h1>

                    <div class="mt-5 flex justify-between items-center" style="width:800px;">
                        <div>

                            <form action="{{route('articles.update',$article->id)}}" method="POST">
                                @method ('PUT') @csrf
                                <div class="flex flex-col max-w-lg">
                                    <label for="nom_fleur" class="block text-sm font-bold text-gray-700">
                                        {{__('Title :')}}
                                    </label>
                                </div>
                                <input type="text" name="nom_fleur" class="mb-3" value="{{$article->fleur['nom_fleur']}}">
                                @error('nom_fleur')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                        </div>
                        <div>
                            <form action="{{route('articles.update',$article->id)}}" method="POST">
                                @method ('PUT') @csrf
                                <div class="flex flex-col max-w-lg">
                                    <label for="etat" class="block text-sm font-bold text-gray-700">
                                        État (vendu, jete, indsiponible, disponible):
                                    </label>
                                </div>

                                <select name="etat" id="etat">
                                    <option value="{{$article->etat}}">{{$article->etat}}</option>
                                    <option value="disponible">disponible</option>
                                    <option value="indisponible">indisponible</option>
                                    <option value="vendu">vendu</option>
                                    <option value="jete">jete</option>
                                </select>


                                @error('etat')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                        </div>

                        <div>
                            <div class="flex flex-col max-w-lg">
                                <label for="date_inventaire" class="block text-sm font-bold text-gray-700">
                                    {{__('Inventory date :')}}
                                </label>
                            </div>
                            <input type="datetime-local" name="date_inventaire" class="mb-3">
                        </div>

                    </div>
                    <div class="mt-5 flex justify-between items-center" style="width:800px;">

                        <div>
                            <form action="{{route('articles.update',$article->id)}}" method="POST">
                                @method ('PUT') @csrf
                                <div class="flex flex-col max-w-lg">
                                    <label for="quantite_stock" class="block text-sm font-bold text-gray-700">
                                        Quantité stockée :
                                    </label>
                                </div>
                                <input type="text" name="quantite_stock" class="mb-3" value="{{$article->quantite_stock}}">
                                @error('quantite_stock')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                        </div>

                        <div>
                            <form action="{{route('articles.update',$article->id)}}" method="POST">
                                @method ('PUT') @csrf
                                <div class="flex flex-col max-w-lg">
                                    <label for="prix_unitaire" class="block text-sm font-bold text-gray-700">
                                        {{__('Price :')}}
                                    </label>
                                </div>
                                <input type="text" name="prix_unitaire" class="mb-3" value="{{$article->prix_unitaire}}">
                                @error('prix_unitaire')
                                <div class="text-red-500">{{$message}}</div>
                                @enderror
                        </div>

                        <div>
                            <div class="flex flex-col max-w-lg">
                                <label for="nombre" class="block text-sm font-bold text-gray-700">
                                    {{__('Quantity (ex: 1, 2 ..etc) :')}}
                                </label>
                            </div>
                            <input type="text" name="nombre" value="{{$article->nombre}}">
                            @error('nombre')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-5 flex justify-between items-center" style="width:800px;">

                        <div>

                            <div class="flex flex-col max-w-lg">
                                <label for="nom_unite" class="block text-sm font-bold text-gray-700">
                                    {{__('Unité (ex: tige, grammes..etc) :')}}
                                </label>
                            </div>
                            <input type="text" name="nom_unite" value="{{$article->unite->nom_unite}}">
                            @error('nom_unite')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <div class="flex flex-col max-w-lg">
                                <label for="taille" class="block text-sm font-bold text-gray-700">
                                    Taille (optionnelle) :
                                </label>
                            </div>
                            <input type="text" name="taille" value="{{$article->unite->taille}}">
                            @error('taille')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="flex flex-col" style="width: 240px;">
                            <label for="couleur" class="font-bold">Couleur </label>
                            <select name="couleur" id="couleur">
                                <option value="">Sélectionner une couleur</option>
                                @foreach($couleurs as $couleur)
                                <option value="{{$couleur->id}}">{{$couleur->couleur}}</option>
                                @endforeach
                            </select>
                            @error('couleur')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>
                        <!-- <div>
                            <div class="flex flex-col max-w-lg">
                                <label for="couleur" class="block text-sm font-bold text-gray-700">
                                    Couleur:
                                </label>
                            </div>
                            <input type="text" name="couleur" value="{{$article->couleur->couleur}}">
                            @error('couleur')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div> -->
                    </div>
                    <div>
                        <br>
                    </div>
                    <div class="flex flex-col" style="width:800px;">
                        <label for="description" class="py-3 font-bold">Description</label>
                        <textarea name="description" id="description">{{$article->description}}</textarea>
                        @error('description')
                        <div class="text-red-500">{{$message}}</div>
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