<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function canDeleteCategory (User $user, Category $category) {
        return DB::table('posts')->selectRaw('count(*)')
                ->where('category_id', $category->id)
                ->where('author_user_id', $user->id)
                ->get()[0]->{'count(*)'} == $category->posts()->count();
    }
}
