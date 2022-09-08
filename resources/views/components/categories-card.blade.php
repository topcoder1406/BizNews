<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Categories</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        <div class="d-flex flex-wrap m-n1">
            @foreach($categories as $category)
                <a href="/categories/{{ $category->slug }}" class="btn btn-sm btn-outline-secondary m-1">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
</div>
