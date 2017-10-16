<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//creating 100 users
    	factory(App\User::class, 10) -> create();
        factory(App\Articles::class, 1000) -> create();
        factory(App\Items::class, 10) -> create();
        factory(App\Sales::class, 1000) -> create();

        
        factory(App\Invoice::class, 100) -> create();
        factory(App\ProductInvoice::class, 100) -> create();
        
        // $this->call(UsersTableSeeder::class);
    }
}
