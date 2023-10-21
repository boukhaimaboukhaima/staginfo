<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Staginfo;


class StaginfoSeeder extends Seeder
{
    public function run()
    {
        Staginfo::factory()->count(10)->create();
    }
    
}
