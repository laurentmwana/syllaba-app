<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\QueryParams\MergeQueryColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'start_at',
        'type',
        'description',
        'image',
    ];

    public static function findPaginated(): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return MergeQueryColumn::generate($builder, $query, 'title', [
            'start_at',
            'type',
            'description',
            'created_at',
            'updated_at',
        ])->paginate();
    }
}
