<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('partials.navbar', function($view) {
            $user_requests = [];

            if(!Auth::guest()){
                foreach (Auth::user()->notifications as $notification){
                    $user_id = $notification['data']["user_id"];
                    $user = DB::table('users')->find($user_id);
                    array_push($user_requests,$user);
                }
            }
            $view->with('user_requests',$user_requests);
        });
    }
}
