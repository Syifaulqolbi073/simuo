<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $kelas = [
            'VII' => ['VII A','VII B'],
            'VIII' => ['VIII A','VIII B'],
            'IX' => ['IX A','IX B'],
        ];

        foreach ($kelas as $gradeName => $list) {

            $grade = Grade::where('name',$gradeName)->first();

            foreach ($list as $nama) {

                Classroom::create([
                    'id' => (string) Str::ulid(),
                    'grade_id' => $grade->id,
                    'code' => str_replace(' ','',$nama),
                    'name' => $nama,
                    'capacity' => 32,
                    'is_active' => true,
                ]);

            }
        }
    }
}