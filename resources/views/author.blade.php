@extends('layouts.main')
@section('title', "{$author->name} - BizNews")

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Posts of {{ $author->name }}</h4>
            </div>
        </div>
        @if(isset($searchQuery))
            <div class="container mb-3 text-black">
                <h4>Search for: "{{ $searchQuery }}"</h4>
                <div class="text-dark">You searching posts of {{ $author->name }}. <a href="/search/{{ Illuminate\Support\Facades\URL::to('/search', [$searchQuery]) }}" class="text-info">Click here</a> for global search.</div>
            </div>
        @endif
        <div class="container">
            <div class="row">
                @if($posts->isEmpty())
                    <div class="mx-auto">No posts yet. Please, check later</div>
                @endif

                @foreach($posts as $post)
                    <x-post-card-md :post="$post"></x-post-card-md>
                @endforeach
                <div class="col-12">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
