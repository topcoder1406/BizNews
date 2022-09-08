<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class PopularNewsInFooter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.popular-news-in-footer', [
            'posts' => cache()->remember('popular_news_in_footer', 60, function () {
                return Post::orderBy('views_count', 'desc')->limit(3)->get();
            })
        ]);
    }
}
