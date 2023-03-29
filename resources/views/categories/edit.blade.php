<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Modifier la catégorie numéro {{$categorie->id}}</h1>
                    <form action="{{route('categories.update',$categorie->id)}}" method="POST">
                        @method ('PUT') @csrf
                        <div>
                            <label for="nom_categorie" class="block text-sm font-bold text-gray-700">
                                {{__('Titre :')}}
                            </label>
                        </div>
                        <input type="text" name="nom_categorie" value="{{$categorie->nom_categorie}}">
                        @error('titre')
                        <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                        @enderror
                        <div>
                            <x-buttons.save :action="route('categories.update', $categorie->id)"></x-buttons.save>
                            <x-buttons.cancel :action="route('categories.index',$categorie->id)"></x-buttons.cancel>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>