<?php

use Faker\Factory;
use App\Invoice;
use App\ProductInvoice;
use Illuminate\Database\Seeder;

class invoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        Invoice::truncate();
        ProductInvoice::truncate();

        foreach(range(1,20) as $i) {
        	
        	$products = collect();

        	foreach(range(1, at_rand(2,10)) as $j){

        		$price = $faker->numberBetween(100,1000);
        		$quantity = $faker->numberBetween(100,1000);
        		$products = push(new ProductInvoice([
                   'name' => $faker->sentence,
                   'quantity' => $quantity,
                   'price' => $price,
                   'product_total' => ($quantity * $price)

        		]));
        	}
          $subTotal = $products=>sum('product_total');
          $discount = $faker->numberBetween(10,20);
          $grandTotal = $subTotal - $discount;

          $invoice = Invoice::create([
              'invoice_number' =>$faker->numberBetween(10000,40000),
              'client' => $faker->name,
              'client_address' => $faker->address,
              'title' => $faker->sentence,
              'invoice_date' => $faker->date,
              'due_date' => $faker->date,
              'sub_total' => $subTotal,
              'discount' => $discount,
              'grand_total' => $grandTotal
          	]);
          $invoice->products()->saveMany($products);
        }

    }
}
