<div class="flex items-center justify-between flex-shrink-0 px-3">
    <!-- Logo -->
    <div class="inline-flex items-center gap-2">
        <x-admin.application-logo aria-hidden="true" class="w-10 h-auto" />
        <span class="sr-only">K UI Logo</span>
    </div>

    <!-- Toggle button -->
    <x-admin.button type="button" iconOnly srText="Toggle sidebar" variant="secondary"
        x-show="isSidebarOpen || isSidebarHovered" @click="isSidebarOpen = !isSidebarOpen">
        <x-admin.icons.menu-fold-right x-show="!isSidebarOpen" aria-hidden="true" class="hidden w-6 h-6 lg:block" />
        <x-admin.icons.menu-fold-left x-show="isSidebarOpen" aria-hidden="true" class="hidden w-6 h-6 lg:block" />
        <x-heroicon-o-x aria-hidden="true" class="w-6 h-6 lg:hidden" />
    </x-admin.button>
</div>
