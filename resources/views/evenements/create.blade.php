<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('evenements.store')}}" method="POST">
                        @csrf
                        <label for="nom_evenement" class="block text-sm font-bold text-gray-700">
                            {{__('add the name of the new event')}}
                        </label>
                        <input type="text" name="nom_evenement" required>
                        @error('titre')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
               
                        <div> 
                            <x-buttons.save :action="route('evenements.store')"></x-buttons.save>
                            <x-buttons.cancel :action="route('evenements.index')"></x-buttons.cancel>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>