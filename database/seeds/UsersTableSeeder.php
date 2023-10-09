<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

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
            'over_name'=>'興野',
            'under_name'=>'なな',
            'over_name_kana'=>'キョウノ',
            'under_name_kana'=>'ナナ',
            'mail_address'=>'us1@atlas.com',
            'sex'=>'1',
            'birth_day'=>'19980122',
            'role'=>'1',
            'password'=>Hash::make('password'),
        ]);
    }
}
