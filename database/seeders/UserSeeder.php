<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $user = User::create([
            'name' => 'Moe',
            'email' => 'mohammedfunu@gmail.com',
            'password' => Hash::make('1234567'),
            'email_verified_At' =>  Carbon::now()

        ]);
        $user->syncRoles('Super Admin');

    }
}
