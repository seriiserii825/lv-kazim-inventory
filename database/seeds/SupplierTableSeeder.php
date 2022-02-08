<?php

use App\Supplier;
use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    public function run()
    {
        factory(Supplier::class, 4)->create();
    }
}
