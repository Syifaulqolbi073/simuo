<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasUlids;
    use SoftDeletes;
public const GROUPS = [
        'Wajib',
        'Muatan Lokal',
        'Tahfidz',
        'Ekstrakurikuler',
        'Pilihan',
    ];
    /**
     * The primary key type.
     */
    protected $keyType = 'string';

    /**
     * Disable auto increment.
     */
    public $incrementing = false;

    /**
     * Mass assignment.
     */
    protected $fillable = [
        'code',
        'name',
        'subject_group',
        'minimum_score',
        'is_active',
    ];

    /**
     * Attribute casting.
     */
    protected function casts(): array
    {
        return [
            'minimum_score' => 'integer',
            'is_active' => 'boolean',
        ];
    }
    /**
 * Guru pengampu.
 */
public function teacherSubjects(): HasMany
{
    return $this->hasMany(TeacherSubject::class);
}
    
    
}