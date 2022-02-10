<?php

use App\Employee;
use App\Expense;
use App\Salary;
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
        // $this->call(UserTableSeeder::class);
        // $this->call(EmployeeTableSeeder::class);
        // $this->call(SupplierTableSeeder::class);
        // $this->call(CategoryTableSeeder::class);
        // $this->call(ProductTableSeeder::class);
        // factory(Expense::class, 4)->create();
        factory(Salary::class, 4)->create();
    }
}