@extends('layouts.main')
@section('title', "Category: $category->name - BizNews")

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Category: {{ $category->name }}</h4>
            </div>
        </div>
        @if(isset($searchQuery))
            <div class="container mb-3">
                <h4>Search for: "{{ $searchQuery }}"</h4>
                <div class="text-dark">You searching in category "{{ $category->name }}". <a href="{{ Illuminate\Support\Facades\URL::to('/search', [$searchQuery]) }}" class="text-info">Click here</a> for global search.</div>
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
