<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentAnswer extends Model
{
    use HasUlids;
    use SoftDeletes;

    protected $fillable = [
        'exam_attempt_id',
        'exam_package_question_id',
        'question_id',
        'answer',
        'essay_answer',
        'is_correct',
        'score',
        'is_doubt',
        'answered_at',
    ];

    protected $casts = [
        'is_correct'  => 'boolean',
        'score'       => 'decimal:2',
        'is_doubt'    => 'boolean',
        'answered_at' => 'datetime',
    ];

    /**
     * Attempt
     */
    public function attempt(): BelongsTo
    {
        return $this->belongsTo(ExamAttempt::class, 'exam_attempt_id');
    }

    /**
     * Paket Soal
     */
    public function packageQuestion(): BelongsTo
    {
        return $this->belongsTo(
            ExamPackageQuestion::class,
            'exam_package_question_id'
        );
    }

    /**
     * Soal
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}