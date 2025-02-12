<?php

namespace App\Models;

use App\Enums\RoleUserEnum;
use Illuminate\Notifications\Notifiable;
use App\Services\QueryParams\MergeQueryColumn;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'student_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function newLetter(): HasOne
    {
        return $this->hasOne(NewLetter::class);
    }

    public static function findAdministrators(): Collection
    {
        return self::where('role', '=', RoleUserEnum::ADMIN->value)
            ->orderByDesc('updated_at')
            ->get();

            
    }


    public static function findPaginated(): LengthAwarePaginator
    {
        $query = request()->query->get('search');

        $builder = self::with(['student'])->orderByDesc('updated_at')
            ->where('role', '!=', RoleUserEnum::ADMIN->value);

        if (null === $query || empty($query)) {
            return $builder->paginate();
        }

        return MergeQueryColumn::generate($builder, $query, 'name', [
            'email',
            'role',
            'email_verified_at',
            'avatar',
            'created_at',
            'updated_at',
        ])->paginate();
    }
}
