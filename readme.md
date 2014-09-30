## Chile Agrícola
Using Laravel
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/version.png)](https://packagist.org/packages/laravel/framework) [![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.png)](https://packagist.org/packages/laravel/framework) [![Build Status](https://travis-ci.org/laravel/framework.png)](https://travis-ci.org/laravel/framework) [![License](https://poser.pugx.org/laravel/framework/license.png)](https://packagist.org/packages/laravel/framework)

## Instalación

Para comenzar a desarrollar, es recomendable utilizar Vagrant.
### 1. Descargar Vagrant
 ```php
   http://www.vagrantup.com/ 
 ```
### 2. Descargar VirtualBox
 ```php
   https://www.virtualbox.org/
 ```
### 3. Configurar homestead
 ```php
   http://laravel.com/docs/homestead
 ```
### 4. Ingresar a Vagrant y a Mysql
 ```php
   vagrant ssh
   mysql -uhomestead -p
   password: "secret"
 ```
### 5. Crear BD chileAgricola
 ```php
   create database chileagricolaDB
 ```

### 6. Crear Migrations y Seeds
 ```php
   php artisan generate migration
   php artisan migrate:refresh --seed
 ```










