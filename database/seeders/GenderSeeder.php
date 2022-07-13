<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->delete();
        $specialization= ['ذكر','أنثى'];
        foreach ($specialization as $n) {
            Gender::create(['name' => $n]);
        }
    }
}
