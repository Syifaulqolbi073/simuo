<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamSchedule extends Model
{
    use HasUlids;
    use SoftDeletes;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [

        'teacher_subject_id',

        'exam_type_id',

        'title',

        'description',

        'exam_date',

        'start_time',

        'duration',

        'token',

        'token_required',

        'shuffle_question',

        'shuffle_option',

        'show_score',

        'show_answer',

        'fullscreen_mode',

        'one_device_only',

        'auto_submit',

        'allow_retry',

        'max_attempt',

        'show_timer',

        'late_tolerance',

        'is_published',

        'status',

        'is_active',

    ];

    protected function casts(): array
    {
        return [

            'exam_date' => 'date',

            'token_required' => 'boolean',

            'shuffle_question' => 'boolean',

            'shuffle_option' => 'boolean',

            'show_score' => 'boolean',

            'show_answer' => 'boolean',

            'fullscreen_mode' => 'boolean',

            'one_device_only' => 'boolean',

            'auto_submit' => 'boolean',

            'allow_retry' => 'boolean',

            'show_timer' => 'boolean',

            'is_published' => 'boolean',

            'is_active' => 'boolean',

        ];
    }

    /**
     * Guru Mengajar.
     */
    public function teacherSubject(): BelongsTo
    {
        return $this->belongsTo(TeacherSubject::class);
    }

    /**
     * Jenis Ujian.
     */
    public function examType(): BelongsTo
    {
        return $this->belongsTo(ExamType::class);
    }

    /**
     * Status yang tersedia.
     */
    public const STATUSES = [

        'Draft' => 'Draft',

        'Terjadwal' => 'Terjadwal',

        'Berlangsung' => 'Berlangsung',

        'Selesai' => 'Selesai',

        'Ditutup' => 'Ditutup',

    ];

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? '-';
    }
}