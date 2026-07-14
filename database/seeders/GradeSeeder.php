<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GradeSeeder extends Seeder
{
    public function run(): void
    {
        $grades = [
            ['VII', 1],
            ['VIII', 2],
            ['IX', 3],
        ];

        foreach ($grades as $grade) {

            Grade::create([
                'id' => (string) Str::ulid(),
                'code' => $grade[0],
                'name' => $grade[0],
                'order' => $grade[1],
                'is_active' => true,
            ]);

        }
    }
}