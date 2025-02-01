<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\QueryParams\MergeQueryColumn;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Level extends Model
{
    /** @use HasFactory<\Database\Factories\LevelFactory> */
    use HasFactory;

    protected $fillable = ['name', 'alias', 'option_id'];

    public function option(): BelongsTo
    {
        return $this->belongsTo(Option::class);
    }

    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class);
    }


    public static function findPaginated(): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return MergeQueryColumn::generate($builder, $query, 'name', [
            'alias',
            'option_id',
            'created_at',
            'updated_at',
        ])->paginate();
    }
}
