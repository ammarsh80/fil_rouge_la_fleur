<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-300 leading-tight">
            {{ __('list of all events') }}
     
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @section('article', 'Tous les articles')
                    
                    <table>
                        <thead>
                            <tr class=" bg-gray-200 pl-5">

                                <th class="pl-3">ID</th>
                                <th>Évènement </th>
                                <th colspan="3">ACTION</th>
                                <th><a href="{{route('evenements.create')}}"><x-buttons.create>Creer</x-buttons.create><a></th>
                            </tr>

                        </thead>

                        @foreach($evenements  as $evenement)
                
                        <tr>
                            <td class="pl-3">
                                <p>{{$evenement->id}}</p>
                            </td>

                            <td class="text-center ml-10 mr-10" style="width:300px;"><a href="{{route('evenements.show', $evenement->id)}}">{{$evenement->nom_evenement}}</a>
                           
                            </td>
                            <td>  <x-buttons.show :action="route('evenements.show', $evenement->id)"></x-buttons.show></td>
                            <td>  <x-buttons.edit :action="route('evenements.edit', $evenement->id)"></x-buttons.edit></td>
                            <td>  <x-buttons.delete :action="route('evenements.destroy',$evenement->id)"></x-buttons.delete></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>