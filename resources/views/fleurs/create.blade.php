<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('fleurs.store')}}" method="POST">
                        @csrf
                        <label for="nouvelle_fleur" class="block text-sm font-bold text-gray-700">
                            {{__('add a new color')}}
                        </label>
                        <input type="text" name="nouvelle_fleur" required>
                        @error('titre')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
               
                        <div> 
                            <x-buttons.save :action="route('fleurs.store')"></x-buttons.save>
                            <x-buttons.cancel :action="route('fleurs.index')"></x-buttons.cancel>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>