<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\ComCode;

class ComCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('com_codes')->truncate();
        $data = [
            ['code_cd' => 'ROLE_ST_01', 'code_nm' => 'Superadmin', 'code_group' => 'ROLE_ST', 'code_value' => ''],
            ['code_cd' => 'ROLE_ST_02', 'code_nm' => 'Admin Kesbangpol', 'code_group' => 'ROLE_ST', 'code_value' => ''],
            ['code_cd' => 'ROLE_ST_03', 'code_nm' => 'Admin Ormas', 'code_group' => 'ROLE_ST', 'code_value' => ''],
           
        ];

        foreach ($data as $datum) {
            ComCode::create($datum);
        }

    }
}
