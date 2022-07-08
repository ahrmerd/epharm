<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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
        Builder::macro('whereLike', function (string $attribute, string $searchTerm) {
            $term = strtolower($searchTerm);
            return $this->orWhere(DB::raw("lower($attribute)"), 'like', "%{$term}%");
        });
        Model::unguard();
    }
}
