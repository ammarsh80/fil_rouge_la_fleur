<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-300 leading-tight">
            {{ __('list of all items') }}
     
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @section('article', 'Tous les articles')
                    
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Article</th>
                                <th>Quantité (Tiges/grammes)</th>
                                <th>Prix</th>
                                <th colspan="2">ACTION</th>
                                <th><a href="{{route('articles.create')}}"><x-buttons.create>Creer</x-buttons.create><a></th>
                            </tr>
                        </thead>

                        @foreach($articles as $article)
                
                        <tr>
                            <td>
                                <p>{{$article->id}}</p>
                            </td>

                            <td><a href="{{route('articles.show', $article->id)}}" class="ml-3">{{$article->fleur['nom_fleur']}} {{ $article->couleur ? $article->couleur['couleur'] : '' }}</a>
                            <td>
                                <p class="ml-5 mr-5 text-green-600 text-center">{{$article->nombre}}</p>
                                </td>
                                <td>
                                    <p class="ml-5 mr-5 text-green-600 text-center">{{$article->prix_unitaire}}</p>
                            </td>
                            </td>
                            <td>  <x-buttons.edit :action="route('articles.edit', $article->id)"></x-buttons.edit></td>
                            <td>  <x-buttons.show :action="route('articles.show', $article->id)"></x-buttons.show></td>
                            <td>  <x-buttons.delete :action="route('articles.destroy',$article->id)"></x-buttons.delete></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>