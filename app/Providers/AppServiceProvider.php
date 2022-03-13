<?php

namespace App\Providers;

use Attribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;
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
        Paginator::useBootstrap();

        Builder::macro('whereLike', function ($attributes, string $search) {
            $this->where(function (Builder $query) use ($attributes, $search) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(str_contains($attribute, '.'),
                    function (Builder $query) use ($attribute, $search){
                        [$relationName, $relationAttribute] = explode('.', $attribute);

                        $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $search) {
                            $query->where($relationAttribute, 'LIKE', "%{$search}%");
                        });
                    },

                    function (Builder $query) use ($attribute, $search) {
                        $query->orWhere($attribute, 'LIKE', "%{$search}%");
                    }
                    );
                }
            });   
            
            return $this;
        });

        Builder::macro('orWhereLike', function ($attributes, string $search) {
            $this->where(function (Builder $query) use ($attributes, $search) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(str_contains($attribute, '.'),
                    function (Builder $query) use ($attribute, $search){
                        [$relationName, $relationAttribute] = explode('.', $attribute);

                        $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $search) {
                            $query->where($relationAttribute, 'LIKE', "%{$search}%");
                        });
                    },

                    function (Builder $query) use ($attribute, $search) {
                        $query->orWhere($attribute, 'LIKE', "%{$search}%");
                    }
                    );
                }
            });   
            
            return $this;
        });
    }
}
