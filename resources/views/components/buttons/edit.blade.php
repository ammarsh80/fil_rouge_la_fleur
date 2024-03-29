@if(isset($action))
<form action="{{$action}}" class="inline">
    @method('PUT') @csrf
    <input type="submit" value="{{__('Modifier')}}" class="max-sm:m-0 max-sm:p-1 inline-flex items-center mt-2 ml-1 mr-1 px-2 py-1 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
</form>
@endif