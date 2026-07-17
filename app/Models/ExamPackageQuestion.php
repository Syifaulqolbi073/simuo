<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamPackageQuestion extends Model
{
    use HasUlids;
    use SoftDeletes;

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'exam_package_id',
        'question_id',
        'question_order',
        'option_order',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'question_order' => 'integer',
        'option_order'   => 'array',
    ];

    /**
     * Paket
     */
    public function examPackage(): BelongsTo
    {
        return $this->belongsTo(ExamPackage::class);
    }

    /**
     * Soal
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}