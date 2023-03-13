<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Modifier l'article numéro {{$article->id}}</h1>
                    <form action="{{route('articles.update',$article->id)}}" method="POST">
                        @method ('PUT') @csrf
                        <div class="flex flex-col max-w-lg">
                            <label for="nom_fleur" class="block text-sm font-bold text-gray-700">
                                {{__('Title :')}}
                            </label>
                        </div>
                        <input type="text" name="nom_fleur" class="mb-3" value="{{$article->fleur['nom_fleur']}}">
                        <div class="flex flex-col max-w-lg">
                            <label for="date_inventaire" class="block text-sm font-bold text-gray-700">
                                {{__('Inventory date :')}}
                            </label>
                        </div>
                        <input type="datetime-local" name="date_inventaire" class="mb-3">
                        <div class="flex flex-col max-w-lg">
                            <label for="prix" class="block text-sm font-bold text-gray-700">
                                {{__('Price :')}}
                            </label>
                        </div>
                        <input type="text" name="prix" value="{{$article->prix_unitaire}}">
                        @error('prix')
                        <div class="text-red-500">{{$message}}</div>
                        @enderror
                        <div class="flex flex-col max-w-lg">
                            <label for="nombre" class="block text-sm font-bold text-gray-700">
                                {{__('Quantity (stems/grams) :')}}
                            </label>
                        </div>
                        <input type="text" name="nombre" value="{{$article->nombre}}">
                        @error('prix')
                        <div class="text-red-500">{{$message}}</div>
                        @enderror
                        <div>
                            <br>
                        </div>
                        <div class="flex flex-col max-w-xs">
                            <label for="couleur" class="py-3 font-bold">Couleur </label>
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
                        <div class="flex flex-col max-w-lg">
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




     <!-- <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-10">
                        {{ __('list of tags of this game') }}
                    </h2>-->

</x-app-layout>