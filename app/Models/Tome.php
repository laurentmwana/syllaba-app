<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\QueryParams\MergeQueryColumn;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Tome extends Model
{
    protected $fillable = ['course_document_id', 'document'];

    public function courseDocument(): BelongsTo
    {
        return $this->belongsTo(CourseDocument::class);
    }


    public static function findPaginated(): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::with(['courseDocument', 'courseDocument.course'])
            ->orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return MergeQueryColumn::generate($builder, $query, 'document', [
            'course_document_id',
            'created_at',
            'updated_at',
        ])->paginate();
    }



    public static function findPaginatedGroup(int $courseDocumentId): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::with(['courseDocument', 'courseDocument.course'])
            ->where('course_document_id', '=', $courseDocumentId)
            ->orderByDesc('updated_at');

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return MergeQueryColumn::generate($builder, $query, 'document', [
            'created_at',
            'updated_at',
        ])->paginate();
    }
}
