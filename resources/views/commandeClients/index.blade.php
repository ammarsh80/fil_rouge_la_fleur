<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-300 leading-tight">
            {{ __('list of all orders') }}

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
                                <th>Date</th>
                                <!-- <th>Articles</th> -->
                                <th class="w-48">Livraison programée</th>
                                <th class="w-36">Livrée à temps</th>
                                <th>État</th>
                                <th colspan="2">ACTION</th>
                                <!-- <th><a href="{{route('articles.create')}}"><x-buttons.create>Creer</x-buttons.create><a></th> -->
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($commandeClients as $commandeClient)
                            <tr class="max-sm:p-0 max-sm:m-0">
                                <td class="max-sm:m-0 max-sm:p-1 pl-3">
                                    <p>{{$commandeClient->id}}</p>
                                </td>
                                <td class=" text-center"><a href="{{route('commandeClients.show', $commandeClient->id)}}" class="ml-5">{{$commandeClient->commande_le}}</a></td>
                               
                                <!-- <td class=" text-center">
                                    @foreach($commandeClient->article as $article)
                                    <p class="pl-3 pr-3">
                                        <a href="{{route('articles.show', $article->id)}}">
                                            {{$article->fleur->nom_fleur}}
                                            {{$article->couleur->couleur}}
                                            {{$article->nombre}}
                                            {{$article->unite->nom_unite}}
                                            {{$article->unite->taille}}
                                        </a></li>
                                    </p>
                                    @endforeach
                                </td> -->

                                <td>
                                    <p class="max-sm:m-0 ml-5 mr-5 text-green-600 text-center">{{$commandeClient->date_livraison_progamme}}</p>
                                </td>
                                <td>
                                    <p class="max-sm:m-0 ml-5 mr-5 text-green-600 text-center">{{ $commandeClient->livre_a_temps ? 'Oui' : 'Non' }}</p>
                                </td>
                                <td>
                                    <p class="max-sm:m-0 ml-5 mr-5 text-green-600 text-center">{{$commandeClient->etat}}</p>
                                </td>
                                <td><x-buttons.show :action="route('commandeClients.show', $commandeClient->id)"></x-buttons.show></td>
                                <td><x-buttons.edit :action="route('commandeClients.edit', $commandeClient->id)"></x-buttons.edit></td>
                                <!-- <td><x-buttons.delete :action="route('commandeClients.destroy',$commandeClient->id)"></x-buttons.delete></td> -->
                            </tr>


                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>