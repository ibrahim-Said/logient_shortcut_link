<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $demo=User::updateOrCreate([
            'email'=>'demo@demo.com',
        ],[
            'name'=>'demo',
            'email'=>'demo@demo.com',
            'password'=>\Hash::make('secret123')
        ]);
    }
}
