<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\CategoryContract;
use App\Repositories\CategoryRepository;

use App\Contracts\AttributeContract;
use App\Repositories\AttributeRepository;

use App\Contracts\BrandContract;
use App\Repositories\BrandRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
    * @var $repositories
    */
    protected $repositories = [
        CategoryContract::class         =>  CategoryRepository::class,
        AttributeContract::class        =>  AttributeRepository::class,
        BrandContract::class            =>  BrandRepository::class,
    ];
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        \Log::info("Req=RepositoryServiceProvider@register Called");

        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
