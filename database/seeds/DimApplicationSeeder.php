<?php

use Illuminate\Database\Seeder;

class DimApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('dim_applications')->insert([
            [
                'app_name' => 'aplikasi_1',
                'table_name' => 'table_ereg',
            ],
            [
                'app_name' => 'aplikasi_2',
                'table_name' => 'table_asrot',
            ],
            [
                'app_name' => 'aplikasi_3',
                'table_name' => 'table_etrackdn',
            ],
            [
                'app_name' => 'aplikasi_3',
                'table_name' => 'table_etrackln',
            ],
        ]);
    }
}
