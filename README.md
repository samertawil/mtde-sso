## About library

mtde/sso is a library built by laravel framework, contains Auth presets (Login, Register, Forget passwork, change password)
development by "MTDE" The Ministry of Communications and Digital Economy

## Installation

- You can install the package via composer using the following command:

<pre><span>composer require mtde/sso:dev-main</span></pre>

- Register package by add provider services in bootstrap folder

<pre><span>  mtde\sso\MtdeSsoServiceProvider::class, </span></pre>

 <pre><span> return [
    ...
     mtde\sso\MtdeSsoServiceProvider::class,
];
</span></pre>

- publish to copy required config files and public assets :

<pre><span>php artisan vendor:publish --provider="mtde\sso\MtdeSsoServiceProvider" </span></pre>

* Laravel Localization
You may register the package middleware in the app/Http/Kernel.php file:

 <pre><span>
 class Kernel extends HttpKernel {
    /**
    * The application's route middleware.
    *
    * @var array
    */
    protected $middlewareAliases = [
        /**** OTHER MIDDLEWARE ****/
        'localize'                => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
        'localizationRedirect'    => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
        'localeSessionRedirect'   => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
        'localeCookieRedirect'    => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
        'localeViewPath'          => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class
    ];
}
          </span></pre>

If you are using Laravel 11, you may register in bootstrap/app.php file in closure withMiddleware:

 <pre><span>
->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            /**** OTHER MIDDLEWARE ALIASES ****/
            'localize'                => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
            'localizationRedirect'    => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            'localeSessionRedirect'   => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
            'localeCookieRedirect'    => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
            'localeViewPath'          => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class,
        ]);
    })
     </span></pre>

- Register Middleware to make "ssoAuth"

 <pre><span>->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
           
            'ssoAuth'                => mtde\sso\Http\Middleware\ssoAuth::class,
           
        ]);
   })
          </span></pre>

- Enable "ar" as supported Locales language from [config/laravellocalization.php - 'supportedLocales' array ]

- Add token string in [config/sso.php - 'ssoToken' key]

- add main page in [config/sso.php - 'redirectRoute' key]

* Url: 

 </span></pre> http://servername/sso/login-form </span></pre>

 *  </span></pre> <h5>Finally Middleware->('ssoAuth');</h5> </span></pre>

  ## License

  This package is distributed under the MIT License. Please see the LICENSE file for more information.
