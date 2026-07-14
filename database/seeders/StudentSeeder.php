<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 60; $i++) {

            Student::create([
                'id' => (string) Str::ulid(),
                'nis' => sprintf('2026%04d', $i),
                'nisn' => sprintf('999999%04d', $i),
                'name' => 'Siswa '.$i,
                'gender' => $i % 2 === 0 ? 'L' : 'P',
                'birth_place' => 'Pati',
                'birth_date' => '2013-01-01',
                'address' => 'Juwana, Pati',
                'phone' => '08123'.str_pad($i, 7, '0', STR_PAD_LEFT),
                'parent_name' => 'Orang Tua '.$i,
                'is_active' => true,
            ]);

        }
    }
}