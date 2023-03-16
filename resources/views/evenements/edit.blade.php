<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Modifier l'evenement numéro {{$evenement->id}}</h1>
                    <form action="{{route('evenements.update',$evenement->id)}}" method="POST">
                        @method ('PUT') @csrf
                        <div>
                            <label for="nom_evenement" class="block text-sm font-bold text-gray-700">
                                {{__('Titre :')}}
                            </label>
                        </div>
                        <input type="text" name="nom_evenement" value="{{$evenement->nom_evenement}}">
                        @error('titre')
                        <div class="text-red-500">{{$message}}</div>
                        @enderror
                        <div>
                            <x-buttons.save :action="route('evenements.update', $evenement->id)"></x-buttons.save>
                    </form>
                    <x-buttons.cancel :action="route('evenements.index',$evenement->id)"></x-buttons.cancel>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>