<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Lina',
            'email' => 'contact@linastaudt.de',
        ]);
        User::factory()->create([
            'name' => 'Timo',
            'email' => 'timo@linastaudt.de',
        ]);
    }
}
