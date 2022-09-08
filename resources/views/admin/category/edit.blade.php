<x-admin.app-layout>
    @if (session()->has('success'))
        <span class="gray-50"></span>
        <x-slot name="additionalScripts">
            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    toast().success('{{ session('success')[0] }}', '{{ session('success')[1] }}').with({
                        color: 'bg-green-600',
                        fontColor: 'gray',
                        fontTone: 50
                    }).show();
                });
            </script>
        </x-slot>
    @endif

    <x-admin.tab>
        <x-slot name="title">
            Edit category "{{ $category->name }}"
        </x-slot>
        <x-admin.category-form :category="$category" :editForm="true"></x-admin.category-form>
    </x-admin.tab>
</x-admin.app-layout>
