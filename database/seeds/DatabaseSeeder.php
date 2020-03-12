<?php

use App\Models\Customer;
use App\Models\Product;
use App\Models\Robot;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 100)->create();
        factory(Customer::class, 25)->create();
        factory(Supplier::class, 25)->create();
        factory(Robot::class, 6)->create();
    }
}
