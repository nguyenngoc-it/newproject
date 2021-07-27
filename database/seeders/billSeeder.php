<?php

namespace Database\Seeders;

use App\Models\bill;
use Illuminate\Database\Seeder;

class billSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        bill::factory(10)->create();
    }
}
