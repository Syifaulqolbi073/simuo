<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Semester;


class AcademicYear extends Model
{
    use HasUlids;
    use SoftDeletes;

    protected $fillable = [

        'code',

        'name',

        'start_date',

        'end_date',

        'is_active',

    ];

    protected function casts(): array
    {
        return [

            'start_date'=>'date',

            'end_date'=>'date',

            'is_active'=>'boolean',

        ];
    }
    public function semesters(): HasMany
{
    return $this->hasMany(Semester::class);
}
/**
 * Penempatan siswa pada tahun pelajaran ini.
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