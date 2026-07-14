<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionBank extends Model
{
    use HasUlids;
    use SoftDeletes;

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'teacher_subject_id',
        'exam_type_id',
        'title',
        'description',
        'total_question',
        'total_score',
        'is_active',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'total_question' => 'integer',
        'total_score'    => 'integer',
        'is_active'      => 'boolean',
    ];

    /**
     * Guru Mengajar
     */
    public function teacherSubject(): BelongsTo
    {
        return $this->belongsTo(TeacherSubject::class);
    }

    /**
     * Jenis Ujian
     */
    public function examType(): BelongsTo
    {
        return $this->belongsTo(ExamType::class);
    }

    /**
     * Daftar Soal
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class)
            ->orderBy('sort_order');
    }

    /**
     * Total Soal Aktif
     */
    public function activeQuestions(): HasMany
    {
        return $this->hasMany(Question::class)
            ->where('is_active', true)
            ->orderBy('sort_order');
    }
}