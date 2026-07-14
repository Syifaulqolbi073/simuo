<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExamType extends Model
{
    use HasUlids;
    use SoftDeletes;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'code',
        'name',
        'category',
        'description',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public const CATEGORIES = [

        'Harian' => 'Harian',

        'Semester' => 'Semester',

        'Tahunan' => 'Tahunan',

        'Latihan' => 'Latihan',

        'Praktik' => 'Praktik',

        'Tahfidz' => 'Tahfidz',

        'Lainnya' => 'Lainnya',

    ];

    public function getCategoryLabelAttribute(): string
    {
        return self::CATEGORIES[$this->category] ?? '-';
    }
    /**
 * Jadwal ujian.
 */
public function examSchedules(): HasMany
{
    return $this->hasMany(ExamSchedule::class);
}
}