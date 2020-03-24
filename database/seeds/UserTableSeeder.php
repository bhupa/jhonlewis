<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users= [
            ['name'=>'Jhon lewis Admin','email'=>'jhon@gmail.com','user_type_id'=>'1','password'=>bcrypt('jhonlewis@123')],
            ['name'=>'Jhon lewis Bhupendra','email'=>'nijbhup27@gmail.com','user_type_id'=>'1','password'=>bcrypt('bhup@123')],
            ['name'=>'Jhon lewis Reception','email'=>'reception@gmail.com','user_type_id'=>'2','password'=>bcrypt('jhonlewis@123')],
            ['name'=>'Test User','email'=>'test@gmail.com','user_type_id'=>null,'password'=>bcrypt('test@123')],

        ];

        DB::table('users')->insert($users);
    }
}
