<?php

namespace mtde\sso;

use Illuminate\Support\ServiceProvider;

class MtdeSsoServiceProvider extends ServiceProvider
{
 
    public function register(): void
    {
        //
    }

 
    public function boot(): void
    {
        // $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        // $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'pack');
        // $this->loadTranslationsFrom(__DIR__.'/../lang','pack');


        $this->publishes(
            [__DIR__ . '/../migrations/' => database_path('migrations'),],
            'migrations'
        );

        
        $this->publishes(
            [__DIR__ . '/../resources/views' => resource_path('views'),],
            'views'
        );


        $this->publishes(
            [__DIR__ . '/../lang/ar/pack.php' => lang_path('ar/pack.php'),],
            'lang'
        );

        
        $this->publishes(
            [__DIR__ . '/../lang/en/pack.php' => lang_path('en/pack.php'),],
            'lang'
        );
 
        $this->publishes([
            __DIR__.'/../public/pack-assets' => public_path('pack-Assets'),
        ],'assets');
    
        $this->publishes([
            __DIR__.'/Http/Controllers/packAuth' => app_path('/Http/Controllers/packAuth'),
        ],'controllers');
        
        $this->publishes([
            __DIR__.'/Http/Middleware' => app_path('/Http/Middleware'),
        ],'middleware');


        $this->publishes([
            __DIR__.'/Http/Models' => app_path('/Http/Models'),
        ]);

        $this->publishes([
            __DIR__.'/Http/Requests' => app_path('/Http/Requests'),
        ]);
    

    }
}
 