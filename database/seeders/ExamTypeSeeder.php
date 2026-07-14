<?php

namespace Database\Seeders;

use App\Models\ExamType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ExamTypeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            [
                'code' => 'UH',
                'name' => 'Ulangan Harian',
                'category' => 'Harian',
            ],

            [
                'code' => 'PTS',
                'name' => 'Penilaian Tengah Semester',
                'category' => 'Semester',
            ],

            [
                'code' => 'PAS',
                'name' => 'Penilaian Akhir Semester',
                'category' => 'Semester',
            ],

            [
                'code' => 'PAT',
                'name' => 'Penilaian Akhir Tahun',
                'category' => 'Tahunan',
            ],

            [
                'code' => 'TO',
                'name' => 'Try Out',
                'category' => 'Latihan',
            ],

            [
                'code' => 'UPR',
                'name' => 'Ujian Praktik',
                'category' => 'Praktik',
            ],

            [
                'code' => 'UTH',
                'name' => 'Ujian Tahfidz',
                'category' => 'Tahfidz',
            ],

        ];

        foreach ($data as $item) {

            ExamType::updateOrCreate(

                ['code' => $item['code']],

                [
                    'id' => (string) Str::ulid(),
                    'name' => $item['name'],
                    'category' => $item['category'],
                    'description' => null,
                    'is_active' => true,
                ]

            );

        }
    }
}