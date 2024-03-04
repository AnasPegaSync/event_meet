<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;

class AddUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        $now = \Carbon\Carbon::now()->format("Y-m-d H:i:s");
        DB::table('users')->insert(array(
            array('id' => 1,'name' => 'Muhammad Hassan Khan','email' => 'hassan@pegasync.com','email_verified_at' => now(),'password' => Hash::make('pegasyncinc@123'),'remember_token' => Str::random(10)),
            array('id' => 2,'name' => 'Munim Hussain','email' => 'Munim@fatimagobi.vc','email_verified_at' => now(),'password' => Hash::make('pegasyncinc@123'),'remember_token' => Str::random(10)),
        ));
    }
}
