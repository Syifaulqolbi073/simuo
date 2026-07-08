<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class AcademicYear extends Model
{
    use HasUlids;
    use SoftDeletes;

    protected $fillable = [

        'code',

        'name',

        'start_date',

        'end_date',

        'is_active',

    ];

    protected function casts(): array
    {
        return [

            'start_date'=>'date',

            'end_date'=>'date',

            'is_active'=>'boolean',

        ];
    }
}