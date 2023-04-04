<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <hr><br>
                    <h1>Détails da l'évènement numéro {{$evenement->id}}</h1><br>
                    <hr>
                    <h2 style="font-weight: bold; font-size:1.5em;">Titre : {{$evenement->nom_evenement}}</h2>
                    <p>{{__('Liste de tous les articles liés à cet évènement')}}:</p>
                    <ul class="list-disc">
                    @foreach($article as $article)
                        <li><a href="{{route('articles.show', $article->id)}}">{{$article->fleur['nom_fleur']}} {{ $article->couleur ? $article->couleur['couleur'] : '' }}</a></li>
                        @endforeach
                    </ul>
                    <div>
                        <x-buttons.edit :action="route('evenements.edit', $evenement->id)"></x-buttons.edit>
                        <x-buttons.delete :action="route('evenements.destroy',$evenement->id)"></x-buttons.delete>
                        <x-buttons.back :action="route('evenements.index',$evenement->id)"></x-buttons.back>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>