<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specialization= ['تعليم أساسي','لغة إنجليزية','تربية إسلامية'];
        foreach ($specialization as $n) {
            Specialization::create(['name' => $n]);
        }
    }
}
