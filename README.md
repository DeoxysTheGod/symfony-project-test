<div align="center">

# ~~ QCM Project with Symfony ~~

</div>

<div align="center">
  <br>
  <a href="https://www.php.net/manual/en/"><kbd> <br> PHP doc <br> </kbd></a>&ensp;&ensp;
  <a href="https://symfony.com/doc/current/index.html"><kbd> <br> Symfony doc <br> </kbd></a>&ensp;&ensp;
  <a href="https://getcomposer.org/doc/"><kbd> <br> Composer doc <br> </kbd></a>&ensp;&ensp;
</div><br>

## Informations

This project is for educational purposes only. It is a simple QCM project with Symfony.

* **php:** `8.3.15`
* **symfony-version:** `7.2.2`
* **composer-version:** `2.8.5`

## Requirements

> [!important]
> This project works with the symfony API in the following repository <a align="center" href="https://github.com/DeoxysTheGod/symfony-project-api.git"><kbd> <br> API Repository <br> </kbd></a>.
>
> To run this project properly, you need to have the API running.

> [!important]
> The API have to be running on the port `127.0.0.1:8001`.

You also need to have the following tools installed on your machine:
* **php:** `8.3.15`
* **symfony:** `7.2.2`
* **composer:** `2.8.5`
* **mysql** or **mariadb**: `8.0.27` or `11.6.2`

## Installation

### step 1: Clone the project
```bash
git clone git@github.com:DeoxysTheGod/symfony-project-test.git
```

### step 2: Install dependencies

```bash
composer install
```

### step 3: Database setup

```bash
php bin/console doctrine:database:create
```
```bash
php bin/console doctrine:migrations:migrate
```
```bash
php bin/console doctrine:fixtures:load
```

### step 4: Run the project

```bash
symfony server:start
```
