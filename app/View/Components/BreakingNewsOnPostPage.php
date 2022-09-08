<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class BreakingNewsOnPostPage extends Component
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
        return view('components.breaking-news-on-post-page', [
            'breaking_news' => cache()->remember('breaking_news_on_post_page', 60, function () {
                return Post::latest()->limit(20)->get();
            })->random(min(5, Post::count()))
        ]);
    }
}
