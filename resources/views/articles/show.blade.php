<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <hr><br>
                    <h1>Détails du l'article numéro {{$article->id}}</h1><br>
                    <hr>
                    <h2 style="font-weight: bold; font-size:1.5em;">{{$article->fleur['nom_fleur']}}</h2>
                    <div class="flex p-6 text-gray-900">
                        <ul>

                            <li><span class="font-bold text-xl mt-4">Couleur: </span>{{ $article->couleur ? $article->couleur['couleur'] : '' }}</li>
                            <li><span class="font-bold text-xl mt-4">Quantité (Tiges/grammes): </span>{{$article->nombre}}</li>
                            <li><span class="font-bold text-xl mt-4">Prix: </span>{{$article->prix_unitaire}}</li>
                       <li>

                       </li>
                        </ul>

                    </ul>
                    </div>
                    <hr>

                    <x-buttons.edit :action="route('articles.edit', $article->id)"></x-buttons.edit>
                    <x-buttons.delete :action="route('articles.destroy',$article->id)"></x-buttons.delete>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>