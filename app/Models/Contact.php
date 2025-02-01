<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\QueryParams\MergeQueryColumn;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Contact extends Model
{


    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];

    public static function findPaginated(): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return MergeQueryColumn::generate($builder, $query, 'name', [
            'email',
            'subject',
            'message',
            'created_at',
            'updated_at',
        ])->paginate();
    }
}
