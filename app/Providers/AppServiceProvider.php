<?php

namespace App\Providers;
use View;
use Carbon\carbon;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

       /*Blade::directive('age', function($expression){

         $data = json_decode($expression);

         $year = $data[0];
         $month = $data[1];
         $day = $data[2];

         $age = Carbon::createFromDate($year,$month,$day) -> age;

         dd($data);
         /*return "<?php echo $age; ?>";
       }); */

       Blade::directive('sayHello', function($expression){
          return "<?php echo 'Hello ' . $expression; ?>";
       });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $age = Carbon::createFromDate(1988,12,23) -> age;
        View::share('age', $age);
        View::share('location', '<b>Jamaica</b>');
        //View::share('key', 'value');
        View::share('name', 'Raynard');
         Schema::defaultStringLength(191);
    }
}
