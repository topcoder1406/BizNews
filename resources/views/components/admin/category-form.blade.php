@props([ 'category' => null, 'editForm' => false ])
<form class="grid gap-6" method="POST" action="{{ $editForm ? route('admin.update-category', $category) : route('admin.store-category') }}">
    @csrf
    @if($editForm)
        @method('PATCH')
    @endif

    <x-admin.validation-errors :errors="$errors"></x-admin.validation-errors>

    <div class="space-y-2 max-w-md">
        <x-admin.label :value="__('Enter category name')"/>
        <x-admin.input class="block w-full" type="text" name="name" required
                       x-on:input.change="document.getElementById('slugInput').value = slugify($event.target.value)"
                       value="{{ old('name') ?? ($category->name ?? '') }}"
                       placeholder="{{ __('Name') }}"/>
    </div>

    <div class="space-y-2 max-w-md">
        <x-admin.label :value="__('Enter category slug')"/>
        <x-admin.input class="block w-full" type="text" name="slug" required id="slugInput"
                       value="{{ old('slug') ?? ($category->slug ?? '') }}"
                       placeholder="{{ __('slug') }}"/>
    </div>

    <div class="max-w-sm">
        <x-admin.button class="justify-center w-full gap-2">
            <span>{{ __($editForm ? 'Save' : 'Create category') }}</span>
        </x-admin.button>
    </div>
</form>
