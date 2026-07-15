<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionMedia extends Model
{
    use HasUlids;
    use SoftDeletes;

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'question_id',
        'media_type',
        'file_name',
        'file_path',
        'mime_type',
        'file_size',
        'sort_order',
        'is_active',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'file_size'  => 'integer',
        'sort_order' => 'integer',
        'is_active'  => 'boolean',
    ];

    /**
     * Relasi ke Soal
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * URL File
     */
    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->file_path);
    }
}