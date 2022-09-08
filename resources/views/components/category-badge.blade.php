@props(['category'])
<a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
