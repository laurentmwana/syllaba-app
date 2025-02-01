<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\QueryParams\MergeQueryColumn;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable  = ['name', 'firstname', 'lastname', 'email', 'phone', 'gender', 'token'];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function levelActuals(): HasMany
    {
        return $this->hasMany(LevelActual::class);
    }


    public static function findPaginated(): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return MergeQueryColumn::generate($builder, $query, 'name', [
            'firstname',
            'lastname',
            'created_at',
            'updated_at',
            'gender'
        ])->paginate();
    }
}
