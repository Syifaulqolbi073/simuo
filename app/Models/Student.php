<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
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
        'nis',
        'nisn',
        'name',
        'gender',
        'birth_place',
        'birth_date',
        'address',
        'phone',
        'parent_name',
        'photo',
        'is_active',
    ];

    /**
     * Attribute casting.
     */
    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'is_active'  => 'boolean',
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
     * Label jenis kelamin.
     */
    public function getGenderLabelAttribute(): string
    {
        return self::GENDERS[$this->gender] ?? '-';
    }

    /**
     * Nama lengkap.
     */
    public function getFullNameAttribute(): string
    {
        return $this->name;
    }
    /**
 * Riwayat kelas siswa.
 */
public function classrooms(): HasMany
{
    return $this->hasMany(StudentClassroom::class);
}
}