<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = [

            ['198001010001','Ahmad Fauzi','S.Pd.','L','ahmad.fauzi@mts.test','081300000001'],
            ['198001010002','Muhammad Arif','S.Pd.I','L','m.arif@mts.test','081300000002'],
            ['198001010003','Abdul Karim','S.Ag.','L','abdul.karim@mts.test','081300000003'],
            ['198001010004','Nur Hidayat','M.Pd.','L','nur.hidayat@mts.test','081300000004'],
            ['198001010005','Ali Mustofa','S.Pd.','L','ali.mustofa@mts.test','081300000005'],

            ['198001010006','Siti Aminah','S.Pd.','P','siti.aminah@mts.test','081300000006'],
            ['198001010007','Nur Aini','S.Pd.I','P','nur.aini@mts.test','081300000007'],
            ['198001010008','Luluk Fathonah','S.Pd.','P','luluk@mts.test','081300000008'],
            ['198001010009','Fitri Wahyuni','S.Pd.','P','fitri@mts.test','081300000009'],
            ['198001010010','Dewi Sartika','S.Pd.','P','dewi@mts.test','081300000010'],

            ['198001010011','Rudi Hartono','S.Kom.','L','rudi@mts.test','081300000011'],
            ['198001010012',"Imam Syafi'i",'S.Pd.I','L','imam@mts.test','081300000012'],
            ['198001010013','Miftahul Huda','M.Pd.I','L','miftah@mts.test','081300000013'],
            ['198001010014','Anita Rahmawati','S.Pd.','P','anita@mts.test','081300000014'],
            ['198001010015','Rina Kurniasih','S.Pd.','P','rina@mts.test','081300000015'],

        ];

        foreach ($teachers as $teacher) {

            Teacher::create([
                'id' => (string) Str::ulid(),
                'nip' => $teacher[0],
                'name' => $teacher[1],
                'title' => $teacher[2],
                'gender' => $teacher[3],
                'email' => $teacher[4],
                'phone' => $teacher[5],
                'address' => 'Juwana, Pati',
                'is_active' => true,
            ]);

        }
    }
}