<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plot extends Model
{
    /** @use HasFactory<\Database\Factories\PlotFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'reference',
        'address',
        'number_hourse',
        'user_id'
    ];

    public function houses(): HasMany
    {
        return $this->hasMany(House::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
