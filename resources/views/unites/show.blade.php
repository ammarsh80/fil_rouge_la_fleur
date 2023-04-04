<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <hr><br>
                    <h1>Détails da l'unité numéro {{$unite->id}}</h1><br>
                    <hr>

                    <h2 style="font-weight: bold; font-size:1.5em;">Titre : {{$unite->nom_unite}}</h2>
                    <h2 style=" font-size:1.2em;">Taille : {{$unite->taille}}</h2>
   
                    </ul>
                    <div>
                        <x-buttons.edit :action="route('unites.edit', $unite->id)"></x-buttons.edit>
                        <x-buttons.delete :action="route('unites.destroy',$unite->id)"></x-buttons.delete>
                        <x-buttons.back :action="route('unites.index',$unite->id)"></x-buttons.back>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>