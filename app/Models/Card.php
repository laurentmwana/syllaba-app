<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
