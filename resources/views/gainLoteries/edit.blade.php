<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Modifier le lot numéro {{$gainLoterie->id}}</h1>
                    <form action="{{route('gainLoteries.update',$gainLoterie->id)}}" method="POST">
                        @method ('PUT') @csrf
                        <div class="flex">
                            <div class="mr-6">
                                <label for="nouvelle_fleur" class="block text-sm font-bold text-gray-700">
                                    {{__('Lot :')}}
                                </label>

                                <input type="text" name="nouveau_lot" value="{{$gainLoterie->lot}}">
                                @error('nouveau_lot')
                                <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="nouvelle_fleur" class="block text-sm font-bold text-gray-700">
                                    {{__('Quantité disponible :')}}
                                </label>
                                <input type="text" name="nouvelle_quantite" value="{{$gainLoterie->quantite_disponible}}">
                                @error('nouvelle_quantite')
                                <div class="text-red-500" style="font-size: 0.6em;">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <x-buttons.save :action="route('gainLoteries.update', $gainLoterie->id)"></x-buttons.save>
                            <x-buttons.cancel :action="route('gainLoteries.index',$gainLoterie->id)"></x-buttons.cancel>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>