<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('articles.store')}}" method="POST">
                        @csrf
                        <label for="nom_fleur" class="block text-sm font-bold text-gray-700">
                            {{__('add the name of the new item')}}
                        </label>
                        <input type="text" name="nom_fleur" required>
                        @error('titre')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="description" class="block tracking-wide text-gray-700 text-xs font-bold mb-1 mt-5">Description de l'article:</label>
                            <textarea name="description" id="description" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required></textarea>
                            @error('description')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>
                        <div> 
                            <x-buttons.save :action="route('articles.store')"></x-buttons.save>
                            <x-buttons.cancel :action="route('articles.index')"></x-buttons.cancel>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>