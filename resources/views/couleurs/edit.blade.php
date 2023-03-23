<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Modifier la couleur numéro {{$couleur->id}}</h1>
                    <form action="{{route('couleurs.update',$couleur->id)}}" method="POST">
                        @method ('PUT') @csrf
                        <div>
                            <label for="nouvelle_couleur" class="block text-sm font-bold text-gray-700">
                                {{__('Titre :')}}
                            </label>
                        </div>
                        <input type="text" name="nouvelle_couleur" value="{{$couleur->couleur}}">
                        @error('titre')
                        <div class="text-red-500">{{$message}}</div>
                        @enderror
                        <div>
                            <x-buttons.save :action="route('couleurs.update', $couleur->id)"></x-buttons.save>
                            <x-buttons.cancel :action="route('couleurs.index',$couleur->id)"></x-buttons.cancel>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>