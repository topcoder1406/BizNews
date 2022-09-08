<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;
use function view;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('admin.layouts.app');
    }
}
