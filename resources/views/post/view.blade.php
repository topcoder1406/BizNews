@extends('layouts.main')
@section('title', $post->title . ' - BizNews')

@section('additional-content-on-top')
    @if(session()->has('success'))
        <script>
            $(document).ready(function () {
                $('body,html').css('scroll-behavior', 'auto');
                document.getElementById('comments-section').scrollIntoView({behavior: 'auto'});
            });
        </script>
    @endif

    <x-breaking-news-on-post-page></x-breaking-news-on-post-page>
@endsection

@section('main-content')
    <!-- News Detail Start -->
    <div class="position-relative mb-3">
        <img class="img-fluid w-100" src="{{ asset('storage/upload/img/' . $post->thumbnail) }}" style="object-fit: cover;">
        <div class="bg-white border border-top-0 p-4">
            <div class="mb-3">
                <x-category-badge :category="$post->category"></x-category-badge>
                <span class="text-body">{{ $post->created_at->toFormattedDateString() }}</span>
            </div>
            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $post->title }}</h1>
            <div>
                {!! $post->body !!}
            </div>
        </div>
        <x-post-card-info :post="$post" tagForName="span"></x-post-card-info>
    </div>
    <!-- News Detail End -->

    <!-- Comment Form Start -->
    @if($errors->isNotEmpty())
        <script src="{{ asset('js/post.view.scrollToComments.js') }}"></script>
    @endif
    <div class="mb-3" id="leave-comment-section">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
        </div>
        <div class="bg-white border border-top-0 p-4">
            <form method="POST" action="/posts/{{ $post->slug }}/comment">
                @csrf
                <input type="hidden" name="tree-parent" id="tree-parent" value="">
                <input type="hidden" name="parent-comment" id="parent-comment" value="">

                <div class="form-row">
                    <div class="col-12 mb-4 text-dark reply-info" style="display: none">
                        <div>Reply for <a class="reply-comment-link" href=""></a></div>
                        <div>
                            <btn class="btn-link cancel-reply" style="cursor: pointer">Not reply, just post a comment.
                            </btn>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input name="username" type="text" class="form-control" id="name"
                                   value="{{ old('username') }}" required>
                            @error('username')
                            <div class="text-danger"><small>{{ str_replace(['username'], ['name'], $message) }}</small>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}"
                                   required>
                            @error('email')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message <span class="text-danger">*</span></label>
                    <textarea name="body" id="message" cols="30" rows="5" class="form-control"
                              required>{{ old('body') }}</textarea>
                    @error('body')
                    <div class="text-danger"><small>{{ str_replace(['body'], ['message'], $message) }}</small></div>
                    @enderror
                </div>
                <div class="form-group mb-0">
                    <input type="submit" value="Leave a comment"
                           class="btn btn-primary font-weight-semi-bold py-2 px-3">
                </div>
            </form>
        </div>
    </div>
    <!-- Comment Form End -->

    <!-- Comment List Start -->
    <script src="{{ asset('js/post.comments.js') }}"></script>
    <div class="mb-3" id="comments-section">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">
                @if ($post->comments->count() == 0)
                    No comments
                @elseif($post->comments->count() == 1)
                    1 comment
                @else
                    {{ $post->comments->count() }} comments
                @endif
            </h4>
        </div>
        @if($post->comments->count())
            @php
                $comments = $post->comments()->paginate(15);
            @endphp
            <div class="bg-white border border-top-0 p-4" style="padding-bottom: 0!important;">
                @foreach($comments as $comment)
                    @if(is_null($comment->parent_comment_id))
                        <div id="comment-{{ $comment->id }}" class="media mb-5">
                            <img src="/img/user.png" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6><span class="text-secondary font-weight-bold">{{ $comment->username }}</span>
                                    <small><i>{{ $comment->created_at->toFormattedDateString() }}</i></small></h6>
                                <p>{!! $comment->body !!}</p>
                                <button class="btn btn-sm btn-outline-secondary reply-btn"
                                        data-username="{{ $comment->username }}" data-tree-id="{{ $comment->id }}"
                                        data-comment-id="{{ $comment->id }}">Reply
                                </button>
                            </div>
                        </div>

                        @foreach($comment->replies as $reply)
                            <div id="comment-{{ $reply->id }}" class="media mb-5" style="padding-left:62px;">
                                <img src="/img/user.png" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6><span class="text-secondary font-weight-bold">{{ $reply->username }}</span>
                                        <small><i>{{ $reply->created_at->toFormattedDateString() }}</i></small></h6>
                                    <p>{!! $reply->body !!}</p>
                                    <button class="btn btn-sm btn-outline-secondary reply-btn"
                                            data-username="{{ $reply->username }}" data-tree-id="{{ $comment->id }}"
                                            data-comment-id="{{ $reply->id }}">Reply
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>

            <div>
                {{ $comments->links() }}
            </div>
        @endif
    </div>
    <!-- Comment List End -->
@endsection
