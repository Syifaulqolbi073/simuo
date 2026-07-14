<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [

            ['MTK', 'Matematika', 'Wajib'],
            ['BIN', 'Bahasa Indonesia', 'Wajib'],
            ['BIG', 'Bahasa Inggris', 'Wajib'],
            ['IPA', 'Ilmu Pengetahuan Alam', 'Wajib'],
            ['IPS', 'Ilmu Pengetahuan Sosial', 'Wajib'],
            ['PKN', 'Pendidikan Pancasila', 'Wajib'],
            ['INF', 'Informatika', 'Wajib'],
            ['SBK', 'Seni Budaya', 'Wajib'],
            ['PJOK', 'Pendidikan Jasmani', 'Wajib'],

            ['PAI', 'Pendidikan Agama Islam', 'Wajib'],
            ['AQH', "Al-Qur'an Hadits", 'Wajib'],
            ['AKA', 'Akidah Akhlak', 'Wajib'],
            ['FIQ', 'Fikih', 'Wajib'],
            ['SKI', 'Sejarah Kebudayaan Islam', 'Wajib'],

            ['BAR', 'Bahasa Arab', 'Muatan Lokal'],
            ['THF', 'Tahfidz', 'Tahfidz'],

        ];

        foreach ($subjects as $subject) {

            Subject::create([
                'id' => (string) Str::ulid(),
                'code' => $subject[0],
                'name' => $subject[1],
                'subject_group' => $subject[2],
                'minimum_score' => 75,
                'is_active' => true,
            ]);

        }
    }
}