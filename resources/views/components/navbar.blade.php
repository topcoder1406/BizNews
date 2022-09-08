@props(['searchQuery'])
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="/" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="/" class="nav-item nav-link{{ request()->routeIs('home') ? ' active' : '' }}">Home</a>
                <a href="{{ request()->routeIs('home') ? '' : '/' }}#latest-news" class="nav-item nav-link">Latest news</a>
                <div class="nav-item dropdown categories-dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        @foreach($categories as $category)
                            <a href="/categories/{{ $category->slug }}" class="dropdown-item">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
                <a href="/contact" class="nav-item nav-link{{ request()->routeIs('contact') ? ' active' : '' }}">Contact</a>
                <div class="nav-item d-md-none">
                    <div class="input-group ml-auto d-lg-flex" style="padding: 8px 15px;">
                        <input type="text" class="form-control border-0 search-input-mobile" placeholder="Keyword">
                        <div class="input-group-append">
                            <button class="input-group-text bg-primary text-dark border-0 px-3 search-button-mobile"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                <input type="text" class="form-control border-0 search-input" placeholder="Search">
                <div class="input-group-append">
                    <button class="input-group-text bg-primary text-dark border-0 px-3 search-button"><i
                            class="fa fa-search"></i></button>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    @php
                        echo " $('.search-input').val('" . addslashes(htmlspecialchars_decode($searchQuery)) . "');";
                        echo " $('.search-input-mobile').val('" . addslashes(htmlspecialchars_decode($searchQuery)) . "');";
                    @endphp
                })
            </script>
        </div>
    </nav>
</div>
