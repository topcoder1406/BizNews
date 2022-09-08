<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        @foreach($tranding_news as $post)
            <x-post-card-sm :post="$post"></x-post-card-sm>
        @endforeach
    </div>
</div>
