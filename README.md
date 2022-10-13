<p align="center">
  <img src="https://raw.githubusercontent.com/antony382/roles-and-permission/master/public/images/logo.png" style="width: 15% !important;max-width: 20% !important;">
</p>

ProcessDrive laravel trans Using With JS File 
=============================================


This library is used for laravel trans method is use for JS File  


Installation
============

Run this command in your terminal

```
composer require process-drive/laravel-js-translation

```

After Installation
==================

To set service provider to config/app.php file

```
 'providers' => [
        ProcessDrive\LaravelJSTranslation\TranslateServiceProvider::class,
    ]
```


To set view file in your appliction. you will set below code in common blade file
 
```
@include("Processdrivepackage::translate")

```

Run this command in your terminal 

````
php artisan trans:json

````
How it use
==========

Your javascript file you can use this 

Trans :
```

trans('about.name')

```

License
=======

MIT
