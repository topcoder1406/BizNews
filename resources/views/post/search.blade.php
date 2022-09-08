@extends('layouts.main')
@section('title', "Search for: \"{$searchQuery}\" - BizNews")

@section('main-content')
    <div class="row">
        <div class="container mb-3 text-black">
            <h4>Search for: "{{ $searchQuery }}"</h4>
        </div>
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
