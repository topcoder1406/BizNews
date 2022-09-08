<h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
@foreach($posts as $post)
    <div class="mb-3">
        <div class="mb-2">
            <x-category-badge :category="$post->category"></x-category-badge>
            <small class="text-body">{{ $post->created_at->toFormattedDateString() }}</small>
        </div>
        <a class="small text-body text-uppercase font-weight-medium"
           href="/posts/{{ $post->slug }}">{{ substr($post->title, 0, 30) . (strlen($post->title) > 30 ? '...' : '') }}</a>
    </div>
@endforeach
