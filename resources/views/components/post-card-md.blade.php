@props(['post'])
<div class="col-lg-6">
    <div class="position-relative mb-3">
        <img class="img-fluid w-100" src="{{ asset('storage/upload/img/' . $post->thumbnail) }}" style="object-fit: cover;">
        <div class="bg-white border border-top-0 p-4">
            <div class="mb-2">
                <x-category-badge :category="$post->category"></x-category-badge>
                <small>{{ $post->created_at->toFormattedDateString() }}</small>
            </div>
            <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="/posts/{{ $post->slug }}">{{ substr($post->title, 0, 45) . (strlen($post->title) > 45 ? '...' : '') }}</a>
            <p class="m-0">{!! $post->excerpt !!}</p>
        </div>
        <x-post-card-info :post="$post"></x-post-card-info>
    </div>
</div>
