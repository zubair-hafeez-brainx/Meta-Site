<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::firstOrCreate(['name' => 'Package Price'], [
            'name' => 'Package Price',
            'value' => '10',
            'type' => 'subscription',
            'enable' => 1
        ]);

        Settings::firstOrCreate(['name' => 'Per Request Price'], [
            'name' => 'Per Request Price',
            'value' => '1',
            'type' => 'subscription',
            'enable' => 1
        ]);

        Settings::firstOrCreate(['name' => 'Monthly Free Requests'], [
            'name' => 'Monthly Free Requests',
            'value' => '4',
            'type' => 'subscription',
            'enable' => 1
        ]);
    }
}
