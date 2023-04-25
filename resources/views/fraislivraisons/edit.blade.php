<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Modifier les frais</h1>
                    <form action="{{route('fraislivraisons.update',$fraisLivraison->id)}}" method="POST">
                        @method ('PUT') @csrf
                        <div>
                            <label for="nouveau_frais" class="block text-sm font-bold text-gray-700">
                                {{__('Titre :')}}
                            </label>
                        </div>
                        <input type="text" name="nouveau_frais" value="{{$fraisLivraison->nom_frais}}">
                        @error('nouveau_frais')
                        <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                        @enderror
                        <div>
                        <div>
                            <label for="nouvelle_somme" class="block text-sm font-bold text-gray-700">
                                {{__('nouvelle somme :')}}
                            </label>
                        </div>
                        <input type="text" name="nouvelle_somme" value="{{$fraisLivraison->somme}}">
                        @error('nouvelle_somme')
                        <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                        @enderror
                        <div>
                            <x-buttons.save :action="route('fraislivraisons.update', $fraisLivraison->id)"></x-buttons.save>
                            <x-buttons.cancel :action="route('fraislivraisons.index',$fraisLivraison->id)"></x-buttons.cancel>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>