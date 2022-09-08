<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;
use App\Models\Category;

class PostForm extends Component
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
        return view('components.admin.post-form', [
            'categories' => cache()->rememberForever('all_categories', fn() => Category::all())
        ]);
    }
}
