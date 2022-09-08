<h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
<div class="m-n1">
    @foreach($categories as $category)
        <a href="/categories/{{ $category->slug }}" class="btn btn-sm btn-secondary m-1">{{ $category->name }}</a>
    @endforeach
</div>
