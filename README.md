# Documentation d'installation de Laravel pour le Projet Gabuzomeu

## Introduction

Cette documentation détaille les étapes nécessaires pour installer Laravel.

## Étapes d'installation

### 1. Installer toutes les dépendances nécessaire pour l'installation

```bash
sudo apt install curl git php libapache2-mod-php php-mbstring php-xmlrpc php-soap php-gd php-xml php-cli php-zip php-bcmath php-tokenizer php-json php-pear php-mysql php-curl apache2
```

<div class="dark bg-gray-950 rounded-md" id="bkmrk-"></div><div class="p-4 overflow-y-auto" id="bkmrk--1"></div>```bash
sudo curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
```

télécharger mysql avec un tuto en ligne

### 2. Cloner le projet Laravel

```bash
cd /var/www/html
sudo git clone https://gitlab.ciel-kastler.fr/2024-gabuzomeu/site_web_laravel
```

### 3. Installer les dépendances Composer

```bash
cd site_web_laravel/
sudo composer update
sudo composer install
```

### 4. Modifier les permission du dossier de projet

```bash
sudo chown -R www-data:www-data /var/www/html/site_web_laravel
sudo chmod -R 755 /var/www/html/site_web_laravel
sudo chown -R www-data:www-data /var/www/html/site_web_laravel/.env
```

### 5. Modifier le fichier .env

```bash
sudo nano /var/www/html/site_web_laravel/.env
```

La partie nous intéressent est celle ci:

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravoyager
DB_USERNAME=laravoyager_user
DB_PASSWORD=mdpsnir

```

Il faut alors remplacer certaines partie dépendent de votre configuration voulu:

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE="Nom de la base de donnée"
DB_USERNAME="Utilisateur de la base de donnée"
DB_PASSWORD="Mot de passe de l'utilisateur de la base de donnée"

```

### 6. Générer la clé et lié le stockage

```bash
sudo php artisan key:generate
sudo php artisan storage:link
```

### 7. Création et remplissage de la base de donnée

```bash
sudo mysql
```

```sql
CREATE DATABASE ma_base;
CREATE USER mon_user@localhost IDENTIFIED by 'mon_password';
GRANT ALL PRIVILEGES ON ma_base.* to mon_user@localhost;
```

Importer la structure et le contenu de la base de données

```bash
cat /var/www/html/site_web_laravel/docker-compose/mysql/init_db.sql | mysql -u nom_user -p nom_database
```

effectuer les migrations et utiliser le seeder

```php
php artisan migrate
php artisan db:seed
```

### 7. Configuration de Apache

```bash
sudo a2enmod rewrite
sudo nano /etc/apache2/sites-enabled/000-default.conf
```

rajouter cette partie a la fin du fichier

```
<Directory /var/www/html/site_web_laravel>
 Allowoverride All
</Directory>
```

et modifier la partie DocumentRoot par:

```
DocumentRoot /var/www/html/site_web_laravel/public
```

## Conclusion

Félicitations ! Vous avez réussi à installer Laravel pour le Projet Gabuzomeu. Vous pouvez maintenant y accéder a l’adresse de la machine avec l’utilisateur <admin@admin.com> et le mot de passe password

Pour plus d'informations sur Laravel, consultez la documentation officielle sur [https://laravel.com/docs](https://laravel.com/docs).