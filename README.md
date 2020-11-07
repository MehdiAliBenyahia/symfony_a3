# symfony_a3
Projet Symfony : Mehdi ALI BENYAHIA, Rayane COSTET, Lucas BERIOT

# Installation

<p>First, you have to download / clone this project : <a href="https://github.com/MehdiAliBenyahia/symfony_a3.git">here</a>.</p>

<p>Second, you have to configure the file (line 32) <b>.env</b> : </p>

```
DATABASE_URL=mysql://yourusername:yourpassword@127.0.0.1:3306/symfony_a3?serverVersion=5.7
```
<p>Then, run the following commands in order, please :</p>

```
cd c:/path/to/symfony_a3
```

```
composer install
```

```
php bin/console doctrine:database:create
```

```
php bin/console doctrine:migrations:migrate
```

<p>Load our Fixtures ! (Dummy's datas) :</p>

```
php bin/console doctrine:fixture:load
```

# Informations
