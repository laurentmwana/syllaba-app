<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = ['post_id', 'user_id', 'message', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }



    public static function findPaginated(): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::with(['post', 'user'])->orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return $builder->where(function ($q) use ($query) {
            $q->whereLike('message', "%$query%")
                ->orWhereLike('post_id', "%$query%")
                ->orWhereLike('user_id', "%$query%")
                ->orWhereLike('status', "%$query%")
                ->orWhereLike('updated_at', "%$query%")
                ->orWhereLike('created_at', "%$query%");
        })
            ->paginate();
    }
}
