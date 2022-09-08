<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $data = $request->validate([
            'username' => 'required|min:2|max:30',
            'email' => 'required|email:filter',
            'body' => 'required|max:300'
        ]);

        $data['body'] = htmlspecialchars($data['body']);
        if (!is_null($request['parent-comment'])) {
            $parent_comment_id = $request['tree-parent'];
            $reply_for = $request['parent-comment'];
            $parent_comment = Comment::find($reply_for);
            if (is_null(Comment::find($parent_comment_id)) || is_null($parent_comment)) {
                return redirect('/');
            }

            $data['parent_comment_id'] = $parent_comment_id;
            $data['body'] = '<a href="#comment-' . $reply_for . '">@' . $parent_comment->username . '</a> ' . $data['body'];
        }

        $data['post_id'] = $post->id;
        $post->comments()->create($data);
        $post->comments_count++;
        $post->save();

        return back()->with([
            'success' => 'Comment posted!'
        ]);
    }
}
