<x-admin.app-layout>
    <x-admin.success-message></x-admin.success-message>

    <x-admin.tab title="Posts">
        <div>
            <form class="items-center" action="{{ route('admin.index-posts') }}">
                <div class="flex">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="simple-search"
                               name="search"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Search"
                               value="{{ request('search') }}"
                        >
                    </div>
                    <button type="submit"
                            class="p-2.5 ml-2 text-sm font-medium text-white bg-purple-700 rounded-lg border border-purple-600 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300">
                        <span>Search</span>
                    </button>
                </div>
            </form>
        </div>
        <div>
            <div class="mt-4">
                <button
                    class="p-2.5 text-sm font-medium text-white bg-purple-700 rounded-lg border border-purple-600 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300"
                    x-on:click="location.href='{{ route('admin.create-post') }}'">
                    <i class="fa fa-plus mr-2"></i>
                    <span>Create new post</span>
                </button>
            </div>
            @if($posts->isEmpty())
                <div class="text-center mt-6">No results</div>
            @else
                <div class="grid lg:grid-cols-3 md:grid-cols-2 xs:grid-cols-1 gap-4 mt-4">
                    @foreach($posts as $post)
                        <div
                            class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <a href="{{ route('showPost', $post) }}">
                                <img class="rounded-t-lg" src="{{ asset('/storage/upload/img/' . $post->thumbnail) }}" alt="{{ $post->name }}"/>
                            </a>
                            <div class="p-5">
                                <a href="{{ route('showPost', $post) }}">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                                </a>
                                <div class="flex mb-2 justify-between">
                                    <a href="{{ route('showCategory', $post->category) }}"
                                       class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-purple-600 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300">
                                        {{ $post->category->name }}
                                    </a>
                                    <span class="text-gray-500">{{ $post->created_at->toFormattedDateString() }}</span>
                                </div>
                                <div
                                    class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!! $post->excerpt  !!}</div>
                                <div class="flex">
                                    <a href="{{ route('admin.edit-post', $post) }}"
                                       class="mr-3 inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        <i class="fa fa-pencil mr-3"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('admin.delete-post', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="button"
                                            onclick="deletePost({{ $post->id }})"
                                            class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                                            <i class="fa-solid fa-trash mr-3"></i>
                                            <span>Delete</span>
                                        </button>
                                        <button id="delete-post-{{ $post->id }}" class="hidden" type="submit"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5">
                    {{ $posts->links('vendor.pagination.tailwind') }}
                </div>
            @endif
        </div>
    </x-admin.tab>

    <x-slot name="additionalScripts">
        <script>
            function deletePost(id) {
                if (confirm('Are you sure?')) {
                    document.getElementById('delete-post-' + id).click();
                }
            }
        </script>
    </x-slot>
</x-admin.app-layout>
