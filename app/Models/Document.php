<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\QueryParams\MergeQueryColumn;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Document extends Model
{

    protected $fillable = ['file', 'price', 'description', 'title'];

    public function levels(): BelongsToMany
    {
        return $this->belongsToMany(Level::class);
    }

    public function yearAcademics(): BelongsToMany
    {
        return $this->belongsToMany(YearAcademic::class);
    }

    public static function findPaginated(): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return MergeQueryColumn::generate($builder, $query, 'file', [
            'price',
            'created_at',
            'updated_at',
        ])->paginate();
    }
}
