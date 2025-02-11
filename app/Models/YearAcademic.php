<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class YearAcademic extends Model
{
    protected $fillable = ['status', 'start', 'end'];


    public function courseDocuments(): HasMany
    {
        return $this->hasMany(CourseDocument::class);
    }

    public static function findPaginated(): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return $builder->where(function ($q) use ($query) {
            $q->whereLike('start', "%$query%")
                ->orWhereLike('end', "%$query%")
                ->orWhereLike('status', "%$query%")
                ->orWhereLike('updated_at', "%$query%")
                ->orWhereLike('created_at', "%$query%");
        })
            ->paginate();
    }
}
