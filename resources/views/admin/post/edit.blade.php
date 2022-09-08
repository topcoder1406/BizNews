<x-admin.app-layout>
    <x-admin.tab>
        <x-admin.success-message></x-admin.success-message>

        <x-slot name="title">
            Edit post "{{ $post->title }}"
        </x-slot>
        <x-admin.post-form :post="$post" editForm="true"></x-admin.post-form>
    </x-admin.tab>

    <x-slot name="additionalScripts">
        <script src="/plugins/ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.config.language = 'en';
            CKEDITOR.replace('post-description');
            CKEDITOR.replace('post-body');
        </script>
    </x-slot>
</x-admin.app-layout>
