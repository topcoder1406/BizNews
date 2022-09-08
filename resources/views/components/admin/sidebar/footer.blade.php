<div class="px-3 flex-shrink-0 lg:hidden">
    <x-admin.button
        type="button"
        iconOnly
        variant="secondary"
        x-show="!isSidebarOpen"
        @click="isSidebarOpen = !isSidebarOpen"
        srText="Toggle sidebar"
    >
        <x-admin.icons.menu-fold-left x-show="isSidebarOpen" class="w-6 h-6" />
        <x-admin.icons.menu-fold-right x-show="!isSidebarOpen" class="w-6 h-6" />
    </x-admin.button>
</div>
