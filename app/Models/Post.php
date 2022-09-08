<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['searchQuery'] ?? false, fn($query, $searchQuery) =>
            $query->where(fn($query) =>
                $query
                    ->where('title', 'like', '%' . $searchQuery . '%')
                    ->orWhere('body', 'like', '%' . $searchQuery . '%')
                    ->orWhere('excerpt', 'like', '%' . $searchQuery . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query
                ->where('category_id', $category->id)
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query
                ->where('author_user_id', $author->id)
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }
}
