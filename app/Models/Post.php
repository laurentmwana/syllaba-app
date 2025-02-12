<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = ['title', 'content', 'image', 'user_id'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public static function findPaginatedFilter(?string $categoryId = null): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::with(['categories', 'comments', 'user'])->orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return $builder->where(function ($q) use ($query) {
            $q->whereLike('title', "%$query%")
                ->orWhereLike('image', "%$query%")
                ->orWhereLike('content', "%$query%")
                ->orWhereLike('updated_at', "%$query%")
                ->orWhereLike('created_at', "%$query%");
        })
            ->paginate();
    }


    public static function findPaginated(): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::with(['categories'])->orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return $builder->where(function ($q) use ($query) {
            $q->whereLike('title', "%$query%")
                ->orWhereLike('image', "%$query%")
                ->orWhereLike('content', "%$query%")
                ->orWhereLike('updated_at', "%$query%")
                ->orWhereLike('created_at', "%$query%");
        })
            ->paginate();
    }
}
