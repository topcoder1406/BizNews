@props([ 'post' => null, 'editForm' => false ])
<form class="grid gap-6" method="POST" action="{{ $editForm ?  route('admin.update-post', $post)  : route('admin.store-post') }}" enctype="multipart/form-data">
    @csrf
    @if($editForm)
        @method('PATCH')
    @endif

    <x-admin.validation-errors :errors="$errors"></x-admin.validation-errors>

    <div class="space-y-2 max-w-md">
        <x-admin.label :value="__('Enter post title')"/>
        <x-admin.input class="block w-full" type="text" name="title" required
                       x-on:input.change="document.getElementById('slugInput').value = slugify($event.target.value)"
                       placeholder="{{ __('Title') }}"
                       value="{{ old('title') ?? ($post->title ?? '') }}"
        />
    </div>

    <div class="space-y-2 max-w-md">
        <x-admin.label :value="__('Enter post slug')"/>
        <x-admin.input class="block w-full" type="text" name="slug" required id="slugInput"
                       placeholder="{{ __('slug') }}"
                       value="{{ old('slug') ?? ($post->slug ?? '') }}"
        />
    </div>

    <div class="space-y-2 max-w-md">
        <x-admin.label :value="__('Choose category')"/>
        <select name="category_id" id="category_id" class="dark:bg-dark-eval-1">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (old('category_id') ?? ($post->category_id ?? 0)) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <x-admin.label :value="__('Choose image')"/>
        <div class="mt-2 grid lg:grid-cols-2 w-full md:grid-cols-1">
            <div>
                <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col justify-center items-center pt-5 pb-6">
                        <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                    </div>
                    <input name="thumbnail" onchange="showImage(event)" accept="image/png, image/jpeg" id="dropzone-file" type="file" class="hidden" />
                </label>
            </div>
            <div class="p-2">
                <img id="image-preview" class="{{ $editForm ? '' : 'hidden ' }}max-w-sm h-auto transition-shadow ease-in-out duration-300 shadow-none hover:shadow-xl" src="{{ $editForm ? asset('/storage/upload/img/' . $post->thumbnail) : '' }}" alt="Post image"/>
            </div>
        </div>
    </div>

    <div class="space-y-2">
        <x-admin.label :value="__('Enter post description')"/>
        <textarea name="excerpt" id="post-description">{{ old('excerpt') ?? ($post->excerpt ?? '') }}</textarea>
    </div>

    <div class="space-y-2">
        <x-admin.label :value="__('Enter post text')"/>
        <textarea name="body" id="post-body">{{ old('body') ?? ($post->body ?? '') }}</textarea>
    </div>

    <div class="max-w-sm">
        <x-admin.button class="justify-center w-full gap-2">
            <span>{{ $editForm ? 'Save' : 'Create post' }}</span>
        </x-admin.button>
    </div>
</form>

<script>
    function showImage(event) {
        let imagePreview = document.getElementById('image-preview');
        imagePreview.src = URL.createObjectURL(event.target.files[0]);
        imagePreview.classList.remove('hidden');
        imagePreview.onload = function() {
            URL.revokeObjectURL(imagePreview.src);
        }
    }
</script>
