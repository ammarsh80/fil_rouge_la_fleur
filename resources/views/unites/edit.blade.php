<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Modifier l'unité numéro {{$unite->id}}</h1>
                    <form action="{{route('unites.update',$unite->id)}}" method="POST">
                        @method ('PUT') @csrf
                        <div>
                            <label for="nouvelle_unite" class="block text-sm font-bold text-gray-700">
                                {{__('Titre :')}}
                            </label>
                        </div>
                        <input type="text" name="nouvelle_unite" value="{{$unite->nom_unite}}">
                        @error('titre')
                        <div class="text-red-500">{{$message}}</div>
                        @enderror

                        <div>
                            <label for="nouvelle_taille" class="block text-sm font-bold text-gray-700">
                                {{__('Taille :')}}
                            </label>
                        </div>
                        <input type="text" name="nouvelle_taille" value="{{$unite->taille}}">
                        @error('titre')
                        <div class="text-red-500">{{$message}}</div>
                        @enderror
                        <div>
                            <x-buttons.save :action="route('unites.update', $unite->id)"></x-buttons.save>
                            <x-buttons.cancel :action="route('unites.index',$unite->id)"></x-buttons.cancel>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>