<x-admin.app-layout>
    <x-admin.tab title="Create new post">
        <x-admin.post-form></x-admin.post-form>
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
