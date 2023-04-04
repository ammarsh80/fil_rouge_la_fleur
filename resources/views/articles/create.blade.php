<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="font-bold p-1 w-92 text-center bg-gray-300">Créer un nouvel article</h1>

                    <div class="mt-5 flex flex-wrap justify-between items-center">
                        <div>

                            <form action="{{route('articles.store',$article->id)}}" method="POST">
                                @csrf
                                <div class="flex flex-col max-w-lg">
                                    <label for="nom_fleur" class="block text-sm font-bold text-gray-700">
                                        {{__('Title :')}}
                                    </label>
                                </div>

                                <select name="nom_fleur" id="nom_fleur" style="width: 220px;">
                                    <option value="">Sélectionner un nom </option>
                                    @foreach($fleurs as $fleur)
                                    <option value="{{$fleur->id}}">{{$fleur->nom_fleur}}</option>
                                    @endforeach
                                </select>
                                @error('nom_fleur')
                                <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                @enderror
                        </div>

                        <div>
                            <form action="{{route('articles.store')}}" method="POST">
                                @csrf
                                <div class="flex flex-col max-w-lg">
                                    <label for="etat" class="block text-sm font-bold text-gray-700">
                                        État (disponible, vendu ..etc.):
                                    </label>
                                </div>

                                <select name="etat" id="etat" style="width: 220px;">
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
                            <form action="{{route('articles.store')}}" method="POST">
                                @csrf
                                <div class="flex flex-col max-w-lg">
                                    <label for="quantite_stock" class="block text-sm font-bold text-gray-700">
                                        Quantité stockée :
                                    </label>
                                </div>
                                <input type="text" name="quantite_stock" style="width: 220px;">
                                @error('quantite_stock')
                                <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                @enderror
                        </div>
                        <?php
                        date_default_timezone_set('Europe/Paris');
                        ?>

                        <div>
                            <div class="flex flex-col max-w-lg">
                                <label for="date_inventaire" class="block text-sm font-bold text-gray-700">
                                    {{__('Inventory date (optional) :')}}
                                </label>
                            </div>
                            <input type="datetime-local" name="date_inventaire" value="{{ date('Y-m-d\TH:i:s') }}">
                        </div>
                    </div>

                    <div class="mt-5 flex flex-wrap justify-between items-center">

                        <div>
                            <form action="{{route('articles.store')}}" method="POST">
                                @csrf
                                <div class="flex flex-col max-w-lg">
                                    <label for="prix_unitaire" class="block text-sm font-bold text-gray-700">
                                        {{__('Price :')}}
                                    </label>
                                </div>
                                <input type="text" name="prix_unitaire" style="width: 220px;">
                                @error('prix_unitaire')
                                <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                @enderror
                        </div>
                        <div>
                            <div class="flex flex-col max-w-lg">
                                <label for="nombre" class="block text-sm font-bold text-gray-700">
                                    {{__('Quantity (ex: 1, 10, 300 ..etc) :')}}
                                </label>
                            </div>
                            <input type="text" name="nombre" style="width: 220px;">
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

                            <select name="nom_unite" id="nom_unite" style="width: 235px;">
                                <option value="">Sélectionner une unité </option>
                                @foreach($unites as $unite)
                                <option value="{{$unite->id}}">{{$unite->nom_unite}} {{$unite->taille}}</option>
                                @endforeach
                            </select>
                            @error('nom_unite')
                            <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                            @enderror
                        </div>

                        <div>
                            <div class="flex flex-col max-w-lg">
                                <label for="couleur" class="block text-sm font-bold text-gray-700">
                                    Couleur (optionnel):
                                </label>
                            </div>
                            <select name="couleur" id="couleur" style="width: 220px; font-size: 0.9em;">
                                <option value="">Sélectionner une couleur</option>
                                @foreach($couleurs as $couleur)
                                <option value="{{$couleur->id}}">{{$couleur->couleur}}</option>
                                @endforeach
                            </select>
                            @error('couleur')
                            <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                            @enderror
                        </div>


                    </div>
                    <div class="mt-5 flex flex-wrap justify-between items-center pt-2 pl-10 pr-10" style="background-color: rgb(145, 169, 231);">

                        <div class="mb-3">
                            <div class="flex flex-col max-w-lg">
                                <label for="categorie" class="block text-m font-bold text-gray-700">
                                    Ajouter une cétégorie :
                                </label>
                            </div>
                            <div class="flex flex-col mr-10">

                                @foreach ($categories as $categorie)
                                <label>
                                    <input type="checkbox" id="categories" name="categories[]" value="{{ $categorie->id }}">
                                    {{ $categorie->nom_categorie }}
                                </label>
                                @endforeach

                                @error('categories')
                                <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                @enderror

                            </div>
                        </div>
                        <div>
                            <div class="flex flex-col max-w-lg">
                                <label for="evenement" class="block text-m font-bold text-gray-700">
                                    Ajouter un évènement :
                                </label>
                            </div>

                            <div class="flex flex-col mr-10">

                                @foreach ($evenements as $evenement)
                                <label>
                                    <input type="checkbox" name="evenements[]" value="{{ $evenement->id }}">
                                    {{ $evenement->nom_evenement }}
                                </label>
                                @endforeach
                            </div>

                            @error('evenement')
                            <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <br>
                    </div>
                    <div class="flex flex-wrap justify-around">
                        <div class="flex flex-wrap flex-col">

                            <label for="description" class="font-bold">Description (optionnelle) :</label>
                            <textarea name="description" id="description" class="h-32" style="width:65vw;">{{$article->description}}</textarea>
                            @error('description')
                            <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="flex flex-wrap flex-col py-1">
                            <form action="{{route('articles.store')}}" method="POST">
                                @csrf
                                <div class="flex flex-col max-w-lg">
                                    <label for="image" class="block text-sm font-bold text-gray-700">
                                        {{__('Saisir le nom de fichier image (ex: fleur.jpg) ')}}
                                    </label>
                                </div>
                                <input type="text" name="image" style="width: 290px;">
                                @error('image')
                                <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                @enderror
                        </div>
                    </div>
                    <div>
                        <x-buttons.save :action="route('articles.store')"></x-buttons.save>
                        <x-buttons.cancel :action="route('articles.index')"></x-buttons.cancel>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>