<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class NewLetter extends Model
{
    /** @use HasFactory<\Database\Factories\NewLetterFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'status', 'unsubscribe_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public static function findPaginated(): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::with(['user'])->orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return $builder->where(function ($q) use ($query) {
            $q->whereLike('user_id', "%$query%")
                ->orWhereLike('status', "%$query%")
                ->orWhereLike('unsubscribe_at', "%$query%")
                ->orWhereLike('updated_at', "%$query%")
                ->orWhereLike('created_at', "%$query%");
        })
            ->paginate();
    }
}
