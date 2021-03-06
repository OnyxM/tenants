<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            ['name' => "water_meter_cube_price", 'value' => "364"],
            ['name' => "tva", 'value' => "0,1925"],
            ['name' => "elec_unit_prices", 'value' => "79,94"],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
