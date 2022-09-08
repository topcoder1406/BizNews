<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class TrandingNews extends Component
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
        return view('components.tranding-news', [
            'tranding_news' => cache()->remember('tranding_news', 60, function () {
                return Post::orderBy('views_count', 'desc')->limit(5)->get();
            })
        ]);
    }
}
