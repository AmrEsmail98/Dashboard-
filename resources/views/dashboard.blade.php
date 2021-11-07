<x-app-layout>
    <x-slot name="header">
        <ul>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

        <li style= " display: inline;
        list-style-type: none;
        padding-right: 20px;
        float: left;" >
            <a class="nav-link"  href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
        @endforeach
        </ul> <br><br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translat.Dashboard') }}

        </h2>

    </x-slot>

    <div class="py- n-6">

        <div class="w-full n-2">

            @role('admin')
            <a href="{{route('add')}}" class="m-2 p-2 bg-green-400 rounded-lg b-2">
                {{__('translat.Creat Category')}}
            </a>
            @endrole
         </div>
         <br>
        <div class=" overflow-x-auto sm:-mx-6 lg:-mx-5">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                @if (Session::has('post_delete'))
                <div class="alert alert-danger" style="background: rgb(230, 118, 118)" role="alert">
                    {{Session::get('post_delete')}}
                </div>
                @endif
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">{{__('translat.Id')}}</th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">{{__('translat.Title')}}</th>
                @role('admin')
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">{{__('translat.Process')}}</th> @endrole
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr></tr>
                    @foreach (App\Models\Post::all() as $post )
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{$post->id}}</td>
                      <td class="px-6 py-4 whitespace-nowrap">{{$post->title}}</td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        @role('admin')
                        <a href="/edit-post/{{$post->id}}" class="m-2 p-2 bg-blue-400 rounded">{{__('translat.Edit')}}</a>
                        <a href="/delete-post/{{$post->id}}" class="m-2 p-2 bg-red-400 rounded">{{__('translat.Delete')}}</a>
                        @endrole

                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
                {{-- <div class="m-2 p-2">Pagination</div> --}}
              </div>
            </div>
          </div>
    </div>
</x-app-layout>
