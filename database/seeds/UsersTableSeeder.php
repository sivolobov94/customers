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
            'email' => '1@1.ru',
            'password' => Hash::make('123123'),
            'email_verified_at' => new DateTime(),
            'role' => 'sale',
            'affiliate_id' => str_random(10),
            'referred_by' => ''
        ]);

        DB::table('users')->insert([
            'email' => '2@2.ru',
            'password' => Hash::make('123123'),
            'email_verified_at' => new DateTime(),
            'role' => 'buyer',
            'affiliate_id' => str_random(10),
            'referred_by' => '1'
        ]);
    }
}
