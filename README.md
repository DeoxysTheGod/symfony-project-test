# QCM Project with Symfony

## Informations
* **php:** `8.3.15`
* **symfony-version:** `7.2.2`
* **composer-version:** `2.8.5`

## Requirements

This project works with the symfony API in the following repository `https://github.com/DeoxysTheGod/symfony-project-api.git`.

To run this project properly, you need to have the API running.

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
