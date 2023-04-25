<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-300 leading-tight">
            {{ __('liste de Frais de Livraison') }}
     
        </h2>
    </x-slot>
    <div class="py-12" id="container_index">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @section('article', 'Tous les articles')
                    
                    <table>
                        <thead>
                            <tr class=" bg-gray-200 pl-5">

                                <th class="pl-3">ID</th>
                                <th >Nom</th>
                                <th>Frais de Livraison </th>
                                <th colspan="2">ACTION</th>
                            </tr>
                        </thead>
                        @foreach($fraisLivraisons  as $fraisLivraison)
                        <tr>
                            <td class="pl-3"><p>{{$fraisLivraison->id}}</p></td>
                            <td class="text-center ml-10 mr-10" style="width:200px;">{{$fraisLivraison->nom_frais}} </td>
                            <td class="text-center ml-10 mr-10" style="width:200px;">{{$fraisLivraison->somme}} </td>
                            <td>  <x-buttons.edit :action="route('fraislivraisons.edit', $fraisLivraison->id)"></x-buttons.edit></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>