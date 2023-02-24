<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-300 leading-tight">
            {{ __('list of all items') }}
            
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @section('article', 'Tous les articles')
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Article</th>
                                <th colspan="2">ACTION</th>
                                <th><a href="{{route('articles.create')}}"><x-buttons.create>Creer</x-buttons.create><a></th>
                            </tr>
                        </thead>
                        @foreach($articles as $article)
                
                        <tr>
                            <td>
                                <p>{{$article->id}}</p>
                            </td>
                            <td><a href="{{route('articles.show', $article->id)}}">{{$article->fleur['nom_fleur']}} </a>
                            </td>
                            <td>  <x-buttons.edit :action="route('articles.edit', $article->id)"></x-buttons.edit></td>
                            <td>  <x-buttons.show :action="route('articles.show', $article->id)"></x-buttons.show></td>
                            <td>  <x-buttons.delete :action="route('articles.destroy',$article->id)"></x-buttons.delete></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>