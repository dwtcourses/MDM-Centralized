<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [

        	'name' => 'Administrator',
            'email' => 'admin',
        	'password' => bcrypt('admin'),
            'role' => 'superAdmin'

        ],
        [
            'name' => 'aplikasi_1',
            'email' => 'app1',
            'password' => bcrypt('admin'),
            'role' => 'adminEreg'

        ],
        [

            'name' => 'aplikasi_2',
            'email' => 'app2',
            'password' => bcrypt('admin'),
            'role' => 'adminAsrot'
        ],
        [
            'name' => 'aplikasi_3',
            'email' => 'app3',
            'password' => bcrypt('admin'),
            'role' => 'adminEtrack'

        ],
        ]);
    }

}
