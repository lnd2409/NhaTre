<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Auth;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $id = Auth::guard('nhatruong')->id();
        $khoiHoc = DB::table('khoihoc')->get();
        View::share('khoiHoc', $khoiHoc);
    }
}
