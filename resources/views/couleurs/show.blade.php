<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <hr><br>
                    <h1>Détails da la couleur numéro {{$couleur->id}}</h1><br>
                    <hr>

                    <h2 style="font-weight: bold; font-size:1.5em;">Titre : {{$couleur->couleur}}</h2>
   
                    </ul>
                    <div>
                        <x-buttons.edit :action="route('couleurs.edit', $couleur->id)"></x-buttons.edit>
                        <x-buttons.delete :action="route('couleurs.destroy',$couleur->id)"></x-buttons.delete>
                        <x-buttons.cancel :action="route('couleurs.index',$couleur->id)"></x-buttons.cancel>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>