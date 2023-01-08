<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminPostController extends Controller
{
    private function safeHtml(string $html) {
        $doc = new \DOMDocument();
        $doc->loadHTML($html);
        $script_tags = $doc->getElementsByTagName('script');
        $length = $script_tags->length;
        for ($i = 0; $i < $length; $i++) {
            $script_tags->item($i)->parentNode->removeChild($script_tags->item($i));
        }

        return $doc->saveHTML();
    }

    public function index()
    {
        return view('admin.post.index', [
            'posts' => Post::filter([
                'searchQuery' => request('search'),
                'author' => auth()->user()
            ])->orderBy('created_at', 'DESC')->paginate(18)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'min:2|max:50',
            'slug' => 'min:2|max:50|unique:posts,slug',
            'thumbnail' => 'required|image|max:' . (2 * 1000),
            'excerpt' => 'min:15|max:500',
            'body' => 'min:15|max:5000'
        ]);

        $data['author_user_id'] = auth()->id();
        $data['thumbnail'] = basename($request->file('thumbnail')->store('upload/img'));

        $data['excerpt'] = static::safeHtml($data['excerpt']);
        $data['body'] = static::safeHtml($data['body']);

        Post::create($data);

        return redirect(route('admin.index-posts'))->with('success', [ 'Post', 'created successfully.' ]);
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post, Request $request)
    {
        Gate::authorize('update-post', $post);

        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'min:2|max:50',
            'slug' => 'min:2|max:50|unique:posts,slug,' . $post->id,
            'thumbnail' => 'image|max:' . (2 * 1000),
            'excerpt' => 'min:15|max:500',
            'body' => 'min:15|max:5000'
        ]);

        if (isset($data['thumbnail'])) {
            $data['thumbnail'] = basename($request->file('thumbnail')->store('upload/img'));
        }

        $data['excerpt'] = static::safeHtml($data['excerpt']);
        $data['body'] = static::safeHtml($data['body']);

        $post->update($data);

        return redirect(route('admin.edit-post', $post))->with('success', [ 'Post', 'updated!' ]);
    }

    public function destroy(Post $post, Request $request)
    {
        Gate::authorize('delete-post', $post);

        $post->delete();
        return back()->with('success', [ 'Post', 'deleted successfully.' ]);
    }
}
