<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-300 leading-tight">
            {{ __('list of all items') }}

        </h2>
    </x-slot>
    <div class="py-12" id="container_index">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-sm:p-0 flex flex-wrap p-6 text-gray-900">
                    @section('article', 'Tous les articles')

                    <table>
                        <thead>
                            <tr class=" bg-gray-200 pl-5 max-sm:m-0 max-sm:p-0 ">

                                <th class="pl-3 max-sm:p-0">ID</th>
                                <th>Article</th>
                                <th>Détails</th>
                                <th>Prix</th>
                                <th>Quantité stockée</th>
                                <th colspan="2">ACTION</th>
                                <th><a href="{{route('articles.create')}}"><x-buttons.create>Creer</x-buttons.create><a></th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                            <tr>
                                <td></td>
                                <td class="text-orange-600 flex justify-center items-center mt-3" style="font-size: 0.8em;">{{$article->alerteStock($article->id)}}</td>
                            </tr>

                            <tr class="max-sm:p-0 max-sm:m-0">
                                <td class="max-sm:m-0 max-sm:p-1 pl-3">
                                    <p>{{$article->id}}</p>
                                </td>
                                <td class=" text-center"><a href="{{route('articles.show', $article->id)}}" class="ml-5">{{$article->fleur['nom_fleur']}} {{ $article->couleur ? $article->couleur['couleur'] : '' }}</a></td>
                                <td>
                                    <p class="max-sm:m-0 ml-5 mr-5 text-green-600 text-center">{{$article->nombre}} {{$article->unite->nom_unite}} {{$article->unite->taille}}</p>
                                </td>
                                <td>
                                    <p class="max-sm:m-0 ml-5 mr-5 text-green-600 text-center">{{$article->prix_unitaire}}</p>
                                </td>
                                <td>
                                    <p class="max-sm:m-0 ml-5 mr-5 text-green-600 text-center">{{$article->quantite_stock}}</p>
                                </td>
                                <td><x-buttons.show :action="route('articles.show', $article->id)"></x-buttons.show></td>
                                <td><x-buttons.edit :action="route('articles.edit', $article->id)"></x-buttons.edit></td>
                                <td><x-buttons.delete :action="route('articles.destroy',$article->id)"></x-buttons.delete></td>
                            </tr>

                        
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>