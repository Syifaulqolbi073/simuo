<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    use HasUlids;

    /**
     * Primary key menggunakan ULID.
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
        'grade_id',
        'code',
        'name',
        'capacity',
        'is_active',
    ];

    /**
     * Attribute casting.
     */
    protected function casts(): array
    {
        return [
            'capacity'  => 'integer',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Relasi ke Tingkat.
     */
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    /**
     * Penempatan siswa pada kelas ini.
     */
    public function students(): HasMany
    {
        return $this->hasMany(StudentClassroom::class);
    }
    /**
 * Wali kelas.
 */
public function homeroomTeachers(): HasMany
{
    return $this->hasMany(HomeroomTeacher::class);
}
/**
 * Guru pengampu.
 */
public function teacherSubjects(): HasMany
{
    return $this->hasMany(TeacherSubject::class);
}
    
}