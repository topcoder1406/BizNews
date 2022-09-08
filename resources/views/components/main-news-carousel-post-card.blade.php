@props(['post'])
<div class="position-relative overflow-hidden" style="height: 500px;">
    <img class="img-fluid h-100" src="{{ asset('storage/upload/img/' . $post->thumbnail) }}" style="object-fit: cover;">
    <div class="overlay">
        <div class="mb-2">
            <x-category-badge :category="$post->category"></x-category-badge>
            <span class="text-white">{{ $post->created_at->toFormattedDateString() }}</span>
        </div>
        <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="/posts/{{ $post->slug }}">{{ substr($post->title, 0, 45) . (strlen($post->title) > 45 ? '...' : '') }}</a>
    </div>
</div>
