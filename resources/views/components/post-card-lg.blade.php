<div class="col-lg-12">
    <div class="row news-lg mx-0 mb-3">
        <div class="col-md-6 h-100 px-0">
            <img class="img-fluid h-100" src="{{ asset('storage/upload/img/' . $post->thumbnail) }}" style="object-fit: cover;">
        </div>
        <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
            <div class="mt-auto p-4">
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
</div>
