<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\QueryParams\MergeQueryColumn;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseDocument extends Model
{
    /** @use HasFactory<\Database\Factories\CourseDocumentFactory> */
    use HasFactory;

    protected $fillable = ['title', 'star', 'price', 'description', 'course_id', 'year_academic_id'];

    public function yearAcademic(): BelongsTo
    {
        return $this->belongsTo(YearAcademic::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function tomes(): HasMany
    {
        return $this->hasMany(Tome::class);
    }

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }


    public static function findPaginated(): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::with(['course', 'yearAcademic', 'tomes'])->orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return MergeQueryColumn::generate($builder, $query, 'name', [
            'alias',
            'lastname',
            'faculty_id',
            'created_at',
            'updated_at',
        ])->paginate();
    }

    public static function findPaginatedFilters(): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::with(['course', 'yearAcademic', 'tomes'])->orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return MergeQueryColumn::generate($builder, $query, 'name', [
            'alias',
            'lastname',
            'faculty_id',
            'created_at',
            'updated_at',
        ])->paginate();
    }
}
