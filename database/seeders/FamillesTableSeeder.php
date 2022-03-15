<?php

namespace Database\Seeders;

use App\Models\Famille;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FamillesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $familles = [
            'Lobe', 'Anne', 'Eleanor'
        ];

        foreach ($familles as $famille) {
            Famille::create([
                'name' => $famille,
                'slug' => Str::slug($famille),
            ]);
        }
    }
}
