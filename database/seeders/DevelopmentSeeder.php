<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Property::class);
    }
}
