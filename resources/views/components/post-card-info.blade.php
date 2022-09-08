@props(['post'])
<div class="d-flex justify-content-between bg-white border border-top-0 p-4">
    <a class="d-flex align-items-center text-secondary" href="/authors/{{ $post->author->username }}">
        <img class="rounded-circle mr-2" src="/img/user.png" width="25" height="25" alt="">
        <{{ $attributes['tagForName'] ?? 'small' }}>{{ $post->author->name }}</{{ $attributes['tagForName'] ?? 'small' }}>
    </a>
    <div class="d-flex align-items-center">
        <small class="ml-3"><i class="far fa-eye mr-2"></i>{{ $post->views_count }}</small>
        <small class="ml-3"><i class="far fa-comment mr-2"></i>{{ $post->comments_count  }}</small>
    </div>
</div>
