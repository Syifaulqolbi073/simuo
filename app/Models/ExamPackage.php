<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamPackage extends Model
{
    use HasUlids;
    use SoftDeletes;

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'exam_schedule_id',
        'package_code',
        'package_name',
        'total_question',
        'total_score',
        'is_random_question',
        'is_random_option',
        'is_active',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'total_question'     => 'integer',
        'total_score'        => 'integer',
        'is_random_question' => 'boolean',
        'is_random_option'   => 'boolean',
        'is_active'          => 'boolean',
    ];

    /**
     * Jadwal Ujian
     */
    public function examSchedule(): BelongsTo
    {
        return $this->belongsTo(ExamSchedule::class);
    }

    /**
     * Daftar Soal Paket
     */
    public function questions(): HasMany
    {
        return $this->hasMany(ExamPackageQuestion::class)
            ->orderBy('question_order');
    }
    public function attempts(): HasMany
{
    return $this->hasMany(ExamAttempt::class);
}
    
    
    
    
    
}