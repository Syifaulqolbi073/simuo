<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasUlids;
    use SoftDeletes;

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'question_bank_id',
        'question_type',
        'question_text',
        'discussion',
        'score',
        'difficulty',
        'sort_order',
        'is_active',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'score'      => 'integer',
        'sort_order' => 'integer',
        'is_active'  => 'boolean',
    ];

    /**
     * Bank Soal
     */
    public function questionBank(): BelongsTo
    {
        return $this->belongsTo(QuestionBank::class);
    }

    /**
     * Pilihan Jawaban
     */
    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class)
            ->orderBy('sort_order');
    }

    /**
     * Pilihan Jawaban Aktif
     */
    public function activeOptions(): HasMany
    {
        return $this->hasMany(QuestionOption::class)
            ->where('is_active', true)
            ->orderBy('sort_order');
    }
}