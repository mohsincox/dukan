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
        DB::table('users')->truncate();

        DB::table('users')->insert([
           'id'        => 1,
           'name'      => 'Mohsin Iqbal',
           'email'     => 'mohsin@gmail.com',
           'password'  => bcrypt('123456')
       ]);
    }
}
