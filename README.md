# Lumen-Env

[![GitHub release](https://img.shields.io/github/release/tumichnix/lumen-env.svg?style=flat-square)](https://github.com/tumichnix/lumen-env/releases)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://raw.githubusercontent.com/tumichnix/lumen-env/master/LICENSE)
[![GitHub issues](https://img.shields.io/github/issues/tumichnix/lumen-env.svg?style=flat-square)](https://github.com/tumichnix/lumen-env/issues)
[![Build Status](https://travis-ci.org/tumichnix/lumen-env.svg?branch=master)](https://travis-ci.org/tumichnix/lumen-env)
[![StyleCI](https://styleci.io/repos/131690958/shield)](https://styleci.io/repos/131690958)

-----

## Install via composer

Run the following command to pull in the latest version:

`composer require tumichnix/lumen-env`

## Bootstrap

Add the following line to the `bootstrap/app.php` file under the providers section:

```php
$app->register(Tumichnix\Env\Providers\EnvServiceProvider::class);

```
