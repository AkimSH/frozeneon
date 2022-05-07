<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pass1 = Hash::make('12345');
        $pass2 = Hash::make('123');
        DB::insert("INSERT INTO `users` (`id`, `email`, `password`, `personaname`, `avatarfull`, `rights`, `likes_balance`, `wallet_balance`, `wallet_total_refilled`, `wallet_total_withdrawn`) VALUES
            (1, 'admin@admin.pl', '$pass1', 'Admin User', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/96/967871835afdb29f131325125d4395d55386c07a_full.jpg', 0, 0, 0, 0, 0),
            (2, 'user@user.pl', '$pass2', 'User #1', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/86/86a0c845038332896455a566a1f805660a13609b_full.jpg', 0, 0, 0, 0, 0);");
    }
}
