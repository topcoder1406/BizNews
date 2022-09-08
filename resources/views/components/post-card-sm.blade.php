@props(['post'])
<div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
    <img class="img-fluid post-card-sm-img" src="{{ asset('storage/upload/img/' . $post->thumbnail) }}" alt="{{ $post->name }}">
    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
        <div class="mb-2">
            <x-category-badge :category="$post->category"></x-category-badge>
            <small>{{ $post->created_at->toFormattedDateString() }}</small>
        </div>
        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="/posts/{{ $post->slug }}">{{ substr($post->title, 0, 45) . (strlen($post->title) > 45 ? '...' : '') }}</a>
    </div>
</div>
@once
    <style>
        .post-card-sm-img {
            width: 110px;
            height: 110px;
        }
    </style>
@endonce
