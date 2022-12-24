<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Intial install en basis commando's.
<b>Voor dit project is Composer vereist. Die kun je via: "https://getcomposer.org/" downloaden.</b>
Bij de eerte pull van de back-end branch moet je via command line de installatie van composer in de root directory aanzetten.
Dit doe je door in de root directory "composer install" te runnen.

Laravel maakt gebruikt van zogeheten artisan commando's voor het maken van classes en het vullen van de database met bijvoorbeeld te tabellen en de test data. Dit omdat de tabellen in de code worden gedefiniëert.

Voor het migreren van de database tabellen zodat deze zichtbaar worden
-php artisan migrate // Initieel
-php artisan migrate:refresh/reset //Wanneer aanpassingen aan de migraties zijn gemaakt naar de initiële migreer actie.

Voor het vervolgens toevoegen van test-data gebruik je de het volgende commando
-php artisan db:seed

Hiermee worden een aantal willekeurige test-gebruikers aangemaakt die gebruikt kunnen worden om visiuele aspecten van de UI te testen.

