<x-admin.app-layout>
    <x-admin.success-message></x-admin.success-message>
    <x-admin.fail-message></x-admin.fail-message>

    <x-admin.tab title="Categories">
        <button
            class="mb-3 p-2.5 text-sm font-medium text-white bg-purple-700 rounded-lg border border-purple-600 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300"
            x-on:click="location.href='{{ route('admin.create-category') }}'">
            <i class="fa fa-plus mr-2"></i>
            <span>Create new category</span>
        </button>
        <table class="min-w-full">
            <thead>
            <tr>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50 dark:bg-dark-eval-1 dark:text-white">
                    Name
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50 dark:bg-dark-eval-1 dark:text-white">
                    # of posts
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50 dark:bg-dark-eval-1 dark:text-white">
                    # of my posts
                </th>
                <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50 dark:bg-dark-eval-1 dark:text-white"
                    colspan="2">
                    Actions
                </th>
            </tr>
            </thead>

            <tbody class="bg-white">
            @foreach($categories as $category)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 dark:bg-dark-eval-1">
                        <a href="{{ route('showCategory', $category) }}"
                           class="text-sm leading-5 text-gray-900 dark:text-white">
                            {{ $category->name }}
                        </a>
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 dark:bg-dark-eval-1 dark:text-white">
                        <div class="flex items-center">
                            {{ $category->posts_count }}
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 dark:bg-dark-eval-1 dark:text-white">
                        <div class="flex items-center">
                            {{ $counts[$category->id] ?? 0 }}
                        </div>
                    </td>

                    <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 dark:bg-dark-eval-1">
                        <a href="{{ route('admin.edit-category', $category) }}"
                           class="text-indigo-600 hover:text-indigo-900">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>

                    <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 dark:bg-dark-eval-1">
                        <form method="POST" action="{{ route('admin.delete-category', $category) }}">
                            @csrf
                            @method('DELETE')
                            <button onclick="deleteCategory({{ $category->id }})"
                                    type="button"
                                    class="text-red-600 hover:text-red-900">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <input id="delete-category-{{ $category->id }}" class="hidden" type="submit"/>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-admin.tab>

    <x-slot name="additionalScripts">
        <script>
            function deleteCategory(id) {
                if (confirm('Are you sure?')) {
                    document.getElementById('delete-category-' + id).click();
                }
            }
        </script>
    </x-slot>
</x-admin.app-layout>
