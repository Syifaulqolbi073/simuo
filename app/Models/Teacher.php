<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasUlids;
    use SoftDeletes;

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
        'nip',
        'name',
        'title',
        'gender',
        'email',
        'phone',
        'address',
        'photo',
        'is_active',
    ];

    /**
     * Attribute casting.
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Jenis Kelamin.
     */
    public const GENDERS = [
        'L' => 'Laki-laki',
        'P' => 'Perempuan',
    ];
    /**
 * Nama lengkap beserta gelar.
 */
public function getFullNameAttribute(): string
{
    return $this->title
        ? "{$this->name}, {$this->title}"
        : $this->name;
}

/**
 * Label jenis kelamin.
 */
public function getGenderLabelAttribute(): string
{
    return self::GENDERS[$this->gender] ?? '-';
}
/**
 * Wali kelas.
 */
public function homeroomTeachers(): HasMany
{
    return $this->hasMany(HomeroomTeacher::class);
}
/**
 * Mata pelajaran yang diampu.
 */
public function teacherSubjects(): HasMany
{
    return $this->hasMany(TeacherSubject::class);
}




}