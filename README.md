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

Daarna wordt er geacht dat je via .env in de root directory de database gegevens van je desbetreffende lokale development omgeving invult. Dingen als de root inlog en database naam. De database moet je dan ook via de SQL tool die je gebruikt van te voren aanmaken.

Laravel maakt gebruikt van zogeheten artisan commando's voor het maken van classes en het vullen van de database met bijvoorbeeld te tabellen en de test data. Dit omdat de tabellen in de code worden gedefiniëert.

Voor het migreren van de database tabellen zodat deze zichtbaar worden
-php artisan migrate // Initieel
-php artisan migrate:refresh/reset //Wanneer aanpassingen aan de migraties zijn gemaakt naar de initiële migreer actie.

Voor het vervolgens toevoegen van test-data gebruik je de het volgende commando
-php artisan db:seed

Hiermee worden een aantal willekeurige test-gebruikers aangemaakt die gebruikt kunnen worden om visiuele aspecten van de UI te testen.

<h3>Functies die via de routes beschikbaar zijn gemaakt in de back-end. Voorbeeld "localhost:8000/users (index) of localhost:8000/users/1 (show)"</h3>

Adds routing for the user related functions. Includes GET, POST, SHOW, PUT/PATCH and DELETE method. <br>
 /users (GET) index <br>
 /users/{id} (GET) show <br>
 /users (POST) create <br>
 /users/{id} (PUT/PATCH) update <br>
 /users/{id} (DELETE) delete <br>
 

Adds routing for the shift related functions. Includes GET, POST, SHOW, PUT/PATCH and DELETE method. <br>
 /shifts (GET) index <br>
 /shifts/{id} (GET) show <br>
 /shifts (POST) create <br>
 /shifts/{id} (PUT/PATCH) update <br>
 /shifts/{id} (DELETE) delete <br>


Adds routing for the role related functions. Includes GET, POST, SHOW, PUT/PATCH and DELETE method. <br>
 /roles (GET) index <br>
 /roles/{id} (GET) show <br><br>
 
 /roles (POST) create <br><br>
 
 <b>Beschikbare post en put parameters:</b><br>
 'name' - String en maximaal 20 karakters. <br>
 'description' - String en maximaal 60 karakters,
 'clearance_level' - Integer te vullen met 1, 2 of 3. Dit staat voor: <br>
  1 = 'Medewerker'.
  2 = 'Team-leider'.
  3 = 'Developer'.
            
 /roles/{id} (PUT/PATCH) update <br>
 
 /roles/{id} (DELETE) delete <br>

//Adds routing for the role related functions. Includes GET and SHOW method.
 /notifications (GET) index <br>
 /notifications/{id} (GET) show <br>
