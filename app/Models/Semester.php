<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Semester extends Model
{
    use HasUlids;
    use SoftDeletes;

    protected $fillable = [
        'academic_year_id',
        'code',
        'name',
        'order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }
    /**
 * Penempatan siswa pada semester ini.
 */
public function studentClassrooms(): HasMany
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
 * Guru mengajar.
 */
public function teacherSubjects(): HasMany
{
    return $this->hasMany(TeacherSubject::class);
}





}