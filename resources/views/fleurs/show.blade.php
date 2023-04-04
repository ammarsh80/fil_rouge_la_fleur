<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <hr><br>
                    <h1>Détails da la fleur numéro {{$fleur->id}}</h1><br>
                    <hr>

                    <h2 style="font-weight: bold; font-size:1.5em;">Titre : {{$fleur->nom_fleur}}</h2>
   
                    </ul>
                    <div>
                        <x-buttons.edit :action="route('fleurs.edit', $fleur->id)"></x-buttons.edit>
                        <x-buttons.delete :action="route('fleurs.destroy',$fleur->id)"></x-buttons.delete>
                        <x-buttons.back :action="route('fleurs.index',$fleur->id)"></x-buttons.back>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>