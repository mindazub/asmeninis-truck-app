<?php

use App\TruckName;
use Illuminate\Database\Seeder;

class TruckNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TruckName::insert([
            'name' => 'Volvo',
        ]);
        TruckName::insert([
            'name' => 'Mac',
        ]);
        TruckName::insert([
            'name' => 'Maz'
        ]);
        TruckName::insert([
            'name' => 'Kamaz',
        ]);
    }
}
