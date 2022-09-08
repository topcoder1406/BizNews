<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    const PAGINATE_PER_PAGE = 10;

    public function index()
    {
        return view('index', [
            'posts' => Post::latest()->paginate(13),
            'main_news' =>  cache()->remember('main_news', 60, function () {
                return Post::orderBy('views_count', 'desc')->limit(8)->get();
            }),
            'featured_news' => cache()->remember('all_posts', 60, function () {
                return Post::all();
            })->random(min(10, cache('all_posts')->count())),
            'breaking_news' => cache()->remember('breaking_news', 60, function () {
                return Post::latest()->limit(20)->get();
            })->random(min(5, cache('breaking_news')->count()))
        ]);
    }

    public function show(Post $post)
    {
        if (!in_array($post->id, session()->get('viewed_posts', []))) {
            $post->views_count++;
            $post->save();

            session()->push('viewed_posts', $post->id);
        }

        return view('post.view', [
            'post' => $post
        ]);
    }

    public function search($searchQuery)
    {
        return view('post.search', [
            'searchQuery' => $searchQuery,
            'posts' => Post::latest()->filter([
                'searchQuery' => $searchQuery
            ])->paginate(static::PAGINATE_PER_PAGE)
        ]);
    }

    public function showFromCategory(Category $category)
    {
        return view('category', [
            'category' => $category,
            'posts' => Post::latest()->filter([
                'category' => $category
            ])->paginate(static::PAGINATE_PER_PAGE)
        ]);
    }

    public function searchInCategory(Category $category, $searchQuery)
    {
        return view('category', [
            'category' => $category,
            'searchQuery' => $searchQuery,
            'posts' => Post::latest()->filter([
                'category' => $category,
                'searchQuery' => $searchQuery
            ])->paginate(static::PAGINATE_PER_PAGE)
        ]);
    }

    public function showByAuthor(User $user)
    {
        return view('author', [
            'author' => $user,
            'posts' => Post::latest()->filter([
                'author' => $user
            ])->paginate(static::PAGINATE_PER_PAGE)
        ]);
    }

    public function searchAuthorsPosts(User $user, $searchQuery)
    {
        return view('author', [
            'author' => $user,
            'searchQuery' => $searchQuery,
            'posts' => Post::latest()->filter([
                'author' => $user,
                'searchQuery' => $searchQuery
            ])->paginate(static::PAGINATE_PER_PAGE)
        ]);
    }
}
