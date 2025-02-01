<?php

namespace App\Services\QueryParams;

use Illuminate\Database\Eloquent\Builder;



class MergeQueryColumn
{
    public static function generate(Builder $builder, string $value, string $column, array $columns = []): Builder
    {
        return $builder->where(function (Builder $q) use ($column, $value, $columns) {
            $q->whereLike($column, "%$value%");

            foreach ($columns as $c) {
                $q->orWhereLike($c, "%$value%");
            }
        });
    }
}
