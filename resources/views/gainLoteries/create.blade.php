<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col p-6 text-gray-900">
                <h1 class="mb-5 font-bold">Créer un nouveau lot :</h1>

                    <form action="{{route('gainLoteries.store')}}" method="POST">
                        @csrf
                        <div class="flex">
                        <div class="mr-6">

                                <label for="nouveau_lot" class="block text-sm font-bold text-gray-700">
                                    {{__('Ajouter un nouveau lot')}}
                                </label>
                                <input type="text" name="nouveau_lot" required>
                                @error('nouveau_lot')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label for="nouvelle_quantite" class="block text-sm font-bold text-gray-700">
                                    {{__('Quantité disponible')}}
                                </label>
                                <input type="text" name="nouvelle_quantite" required>
                                @error('nouvelle_quantite')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                            <div>
                                <x-buttons.save :action="route('gainLoteries.store')"></x-buttons.save>
                                <x-buttons.cancel :action="route('gainLoteries.index')"></x-buttons.cancel>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>