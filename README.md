
## About  library

mtde/sso is a library built by laravel framework, contains Auth presets (Login, Register, Forget passwork, change password)
development by "MTDE" 


 
## Installation
You can install the package via composer:

<pre><span>composer require mtde/sso</span></pre>

 
Register package by add provider services in bootstrap folder 

<pre><span>  mtde\sso\MtdeSsoServiceProvider::class, </span></pre>


 <pre><span> return [
    ...
     mtde\sso\MtdeSsoServiceProvider::class,
];
</span></pre>

publish :

<pre><span>php artisan vendor:publish --provider=" mtde\sso\MtdeSsoServiceProvider" </span></pre>


Register middleware to localize the browser language

 <pre><span>->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
           
            'ssoAuth'                => mtde\sso\Http\Middleware\ssoAuth::class,
           
        ]); </span></pre>

Enable "ar"  as supported Locales language from [config - laravellocalization.php] 

Add your token in [config - sso.php - 'ssoToken' key]

add your main page in [config - sso.php - 'redirectRoute' key]
 
   ## License
   This package is distributed under the MIT License. Please see the LICENSE file for more information.