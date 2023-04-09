<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-300 leading-tight">
            {{ __('list of flowers') }}
     
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
                                <th>Couleur </th>
                                <th>Quantité disponible </th>
                                <th colspan="1">ACTION</th>
                                <th><a href="{{route('gainLoteries.create')}}"><x-buttons.create>Creer</x-buttons.create><a></th>
                            </tr>

                        </thead>

                        @foreach($gainLoteries as $gainLoterie)
                
                        <tr>
                            <td class="pl-3">
                                <p>{{$gainLoterie->id}}</p>
                            </td>

                            <td class="text-center ml-10 mr-10" style="width:300px;">{{$gainLoterie->lot}}
                            <td class="text-center ml-10 mr-10" style="width:300px;">{{$gainLoterie->quantite_disponible}}
                           
                            </td>
                            <td>  <x-buttons.edit :action="route('gainLoteries.edit', $gainLoterie->id)"></x-buttons.edit></td>
                            <td>  <x-buttons.delete :action="route('gainLoteries.destroy',$gainLoterie->id)"></x-buttons.delete></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>