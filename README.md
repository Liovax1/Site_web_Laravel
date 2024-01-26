## LaraVoyageur - Container docker Laravel+Voyager Ready to Go

## Contenu

3 containers
* Une application Laravel avec Laravel pre packagé
* Un serveur nginx
* Un serveur mariadb

## Source

Basé sur le tutoriel [Digital Ocean - How To Install and Set Up Laravel with Docker Compose on Ubuntu 22.04](https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-22-04)


### Quelques modifications du tutoriel

* Utilisation des containers plus récents pour nginx, mysql et php
* Utilisation de `docker compose` et non pas `docker-compose`
* Adaptation des noms pour refléter notre application `laravoyager`
* Un volume persistant pour la base de donnée
* Le .env est publié pour avoir les infos BDD, etc **(à ne pas faire en production !!!)**

### USage

* Cloner le dépôt
* Compiler l'image

~~~ shell
docker compose build app
~~~
* Lancer les containers

~~~ shell
docker compose up -d
~~~

* Vérifier que les containers s'exécutent correctement

~~~ shell
docker compose ps
NAME                IMAGE               COMMAND                  SERVICE             CREATED             STATUS              PORTS
laravoyager-app     laravoyager         "docker-php-entrypoi…"   app                 2 minutes ago       Up 2 minutes        9000/tcp
laravoyager-db      mariadb:10.5        "docker-entrypoint.s…"   db                  2 minutes ago       Up 2 minutes        3306/tcp
laravoyager-nginx   nginx:1.22-alpine   "/docker-entrypoint.…"   nginx               2 minutes ago       Up 2 minutes        0.0.0.0:8000->80/tcp, :::8000->80/tcp
~~~


* Installer les dépendances ( cela crée le dossier vendor)

~~~ shell
docker compose exec app rm -rf vendor composer.lock

docker compose exec app composer install
~~~

* Installer breeze
~~~ shell
docker compose exec app composer require laravel/breeze:1.9.2
docker compose exec app php artisan breeze:install
 
docker compose exec app npm install
docker compose exec app npm run dev
docker compose exec app php artisan migrate
~~~

* Ajouter le code suivant dans le fichier routes/web.php
~~~ shell
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
~~~

* Accéder à l'application

~~~
http://127.0.0.1:8000
~~~


### Crédentials

__Voyager__  
admin@admin.com  
password  