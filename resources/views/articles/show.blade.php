<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <hr><br>
                    <h1>Détails du l'article numéro {{$article->id}}</h1><br>
                    <hr>
                    <h2 style="font-weight: bold; font-size:1.5em;">{{$article->fleur['nom_fleur']}}</h2>
                    <hr>
                    <div class="flex p-6 text-gray-900">
                        <ul>

                            <li class="font-bold text-xl article-info">Date inventaire (optionnelle): <span class="font-normal article-reponse">{{$article->date_inventaire}}</span></li>
                            <li class="font-bold text-xl article-info">Etat de stock: <span class="font-normal text-s article-reponse">{{$article->etat}}</span></li>
                            <li class="font-bold text-xl article-info">Quantité de stock: <span class="font-normal text-s article-reponse">{{$article->quantite_stock}}</span></li>
                            <hr>
                            <br>
                            <li class="font-bold text-xl article-info">Couleur: <span class="font-normal text-s article-reponse">{{ $article->couleur ? $article->couleur['couleur'] : '' }}</span></li>
                            <li class="font-bold text-xl article-info">Détails: <span class="font-normal text-s article-reponse">{{$article->nombre}} {{$article->unite->nom_unite}} {{$article->unite->taille}}</span></li>
                            <li class="font-bold text-xl article-info">Prix: <span class="font-normal text-s article-reponse">{{$article->prix_unitaire}}</span></li>
                            <li class="font-bold text-xl article-info">Catégorie: <span class="font-normal text-s article-reponse">(Liste des catégories auxquelles appartient cet article)</span></li>
                            <ul class="p-1 mb-5">
                                @foreach($article->categorie as $categorie)
                                <li><a href="{{route('categories.show', $categorie->id)}}"> - {{$categorie->nom_categorie}}</a></li>
                                @endforeach
                                
                            </ul>

                            <li class="font-bold text-xl article-info">Évènement: <span class="font-normal text-s article-reponse">(Liste des évènements auxquels appartient cet article)</span></li>
                            <ul class="p-1 mb-5">
                                @foreach($article->evenement as $evenement)
                                <li><a href="{{route('evenements.show', $evenement->id)}}"> - {{$evenement->nom_evenement}}</a></li>
                                @endforeach
                                
                            </ul>
                            <li class="font-bold text-xl article-info">Description (optionnelle): <span class="font-normal text-s article-reponse">{{$article->description}}</span></li>

                        </ul>
                    </div>
                    <hr>

                    <x-buttons.edit :action="route('articles.edit', $article->id)"></x-buttons.edit>
                    <x-buttons.delete :action="route('articles.destroy',$article->id)"></x-buttons.delete>
                    <x-buttons.back :action="route('articles.index')"></x-buttons.back>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>