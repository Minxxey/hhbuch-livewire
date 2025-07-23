<?php

namespace Database\Seeders;

use App\Enum\TagEnum;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (TagEnum::cases() as $tag) {
            Tag::factory(
                ['name' => $tag->name],
                ['color' => $tag->color()]
            )->create();
        }
    }
}
