<?php

use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userType = [
            ['name'=>'Admin','slug'=>'admin'],
            ['name'=>'Receptionist','slug'=>'receptionist'],
        ];
        DB::table('users_type_')->insert($userType);
    }
}
