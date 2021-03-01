<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Order;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['front.parts.header', 'front.parts.footer', 'front.contacts', 'front.howto'], function($view) {
            $view->with(['contacts' => Contact::all()->keyBy('key')]);
        });

        View::composer(['layouts.app', 'home'], function($view) {
            $view->with(['ordersCount' => Order::orderBy('id', 'DESC')->where('status_id', 1)->count()]);
        });
    }
}
