<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamAttempt extends Model
{
    use HasUlids;
    use SoftDeletes;

    protected $fillable = [
        'exam_schedule_id',
        'exam_package_id',
        'student_id',
        'token',
        'started_at',
        'finished_at',
        'submitted_at',
        'duration_used',
        'score',
        'status',
        'ip_address',
        'user_agent',
        'is_locked',
    ];

    protected $casts = [
        'started_at'    => 'datetime',
        'finished_at'   => 'datetime',
        'submitted_at'  => 'datetime',
        'duration_used' => 'integer',
        'score'         => 'decimal:2',
        'is_locked'     => 'boolean',
    ];

    /**
     * Jadwal Ujian
     */
    public function examSchedule(): BelongsTo
    {
        return $this->belongsTo(ExamSchedule::class);
    }

    /**
     * Paket Ujian
     */
    public function examPackage(): BelongsTo
    {
        return $this->belongsTo(ExamPackage::class);
    }

    /**
     * Siswa
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Jawaban
     */
    public function answers(): HasMany
{
    return $this->hasMany(StudentAnswer::class)
        ->orderBy('exam_package_question_id');
}
public function isStarted(): bool
{
    return $this->status === 'Started';
}

public function isFinished(): bool
{
    return in_array($this->status, [
        'Submitted',
        'Finished',
    ]);
}

    /**
     * Status Attempt
     */
    public const STATUSES = [
        'Waiting',
        'Started',
        'Submitted',
        'Finished',
        'Expired',
        'Cancelled',
    ];
}