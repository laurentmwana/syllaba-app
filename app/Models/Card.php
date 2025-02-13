<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Services\QueryParams\MergeQueryColumn;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Card extends Model
{
    protected $fillable = [
        'course_document_id',
        'completed',
        'quantities',
        'prices',
        'student_id'
    ];

    public function courseDocument(): BelongsTo
    {
        return $this->belongsTo(CourseDocument::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
    public static function findAllForStudent(int $studentId): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::with(['courseDocument'])->orderByDesc('updated_at')
            ->where('student_id', '=', $studentId);

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return MergeQueryColumn::generate($builder, $query, 'quantities', [
            'prices',
            'course_document_id',
            'completed',
            'created_at',
            'updated_at',
        ])->paginate();
    }
}
