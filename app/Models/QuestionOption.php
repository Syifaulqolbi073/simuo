<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionOption extends Model
{
    use HasUlids;
    use SoftDeletes;

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'question_id',
        'option_key',
        'option_text',
        'is_correct',
        'sort_order',
        'is_active',
    ];

    /**
     * Attribute Casting
     */
    protected $casts = [
        'is_correct' => 'boolean',
        'sort_order' => 'integer',
        'is_active'  => 'boolean',
    ];

    /**
     * Soal
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
    /**
 * Bank Soal
 */
public function questionBank()
{
    return $this->question->questionBank();
}
}