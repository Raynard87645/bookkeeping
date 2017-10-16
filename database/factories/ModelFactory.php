<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'userName' => $faker->word,
        'dob' => Carbon\Carbon::parse('2016-01-23'),
        'password' => $password ?: $password = 'secret',
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Articles::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user_id' => App\User::all()->random()->id,
        'content' => $faker->paragraph(5),
        'live' => $faker->boolean(),
        'post_on' => Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2016-01-23 11:53:20'),
    ];
});
$factory->define(App\Items::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'item_name' => $faker->name,
        'item_amount' => $faker->numberBetween(0,10),
        'item_short_code' => $faker->unique()->numberBetween(0,10),
    ];
});
$factory->define(App\Sales::class, function (Faker\Generator $faker) {
    static $password;
    
    return [
        'user_id' => App\User::all()->random()->id,
        'item_id' => App\Items::all()->random()->id,
        'customer_id' => $faker->unique()->numberBetween(199,2000),
       // 'sale_date' => Carbon\Carbon::parse('1 week'),
    ];
});
$factory->define(App\ProductInvoice::class, function (Faker\Generator $faker) {
    static $password;

    $price = $faker->numberBetween(100,1000);
            $quantity = $faker->numberBetween(100,1000);
     $invoice_number = App\Invoice::all()->random()->invoice_number;
    return [
                    
                   'invoice_id' => $invoice_number,
                   'name' => $faker->sentence,
                   'quantity' => $quantity,
                   'price' => $price,
                   'product_total' => ($quantity * $price)
    ];
   
});
$factory->define(App\Invoice::class, function (Faker\Generator $faker) {
    static $password;
           $price = $faker->numberBetween(100,1000);
            $quantity = $faker->numberBetween(100,1000);
          $subTotal = ($quantity * $price);
          $discount = $faker->numberBetween(10,20);
          $grandTotal = $subTotal - $discount;
    return [
              'invoice_number' =>$faker->numberBetween(10000,40000),
              'client' => $faker->name,
              'client_address' => $faker->address,
              'title' => $faker->sentence,
              'invoice_date' => $faker->date,
              'due_date' => $faker->date,
              'sub_total' => $subTotal,
              'discount' => $discount,
              'grand_total' => $grandTotal
    ];
});
/*$factory->define(App\Employee::class, function (Faker\Generator $faker) {
    static $password;
    
    return [
           'first_name' => $faker->word,
           'last_name' => $faker->word,
           'address_street' =>$faker->word, 
           'address_town' => $faker->word,
           'address_parish' =>$faker->word, 
           'address_country' =>$request->address_country,
           'dob' => $dateOfBirth->toDateString(),
           'email' => $request->email,
           'ssn' => (isset($request->snn)) ? $request->snn : $snn,
           'hire_date' => $request->hire_date,
           'work_location' =>$request->work_location, 
           'wages' => $request->wages,
           'wages_amount' => (isset($request->wages_amount)) ? $request->wages_amount : $wages_amount,
           'vacation' => $request->vacation,
           'currency' => $request->currency,
           'effective_date' => (isset($request->effective_date)) ? $request->effective_date : Carbon::now(),
    ];
});*/

