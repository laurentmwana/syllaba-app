<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }


    public static function findPaginated(): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::with(['posts'])->orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return $builder->where(function ($q) use ($query) {
            $q->whereLike('name', "%$query%")
                ->orWhereLike('description', "%$query%")
                ->orWhereLike('updated_at', "%$query%")
                ->orWhereLike('created_at', "%$query%");
        })
            ->paginate();
    }
}
