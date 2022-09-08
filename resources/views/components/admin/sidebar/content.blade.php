<x-admin.perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">
    <x-admin.sidebar.link title="Posts" href="{{ route('admin.index-posts') }}" :isActive="request()->routeIs('admin.index-posts')" icon="blog">
    </x-admin.sidebar.link>

    <x-admin.sidebar.link title="Categories" href="{{ route('admin.index-categories') }}" :isActive="request()->routeIs('admin.index-categories')" icon="list">
    </x-admin.sidebar.link>

    <x-admin.sidebar.link title="Settings" href="{{ route('admin.settings') }}" :isActive="request()->routeIs('admin.settings')" icon="gear">
    </x-admin.sidebar.link>
</x-admin.perfect-scrollbar>
