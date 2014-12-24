## Slim PHP Framework Using Twig vs Mustache

### Install

Clone the repository and run ``` composer install ``` to install dependencies. (Requires you to install [composer](#install-composer-globally))

## Run

Then just spin up a localhost using PHP's built-in server

```
php -S localhost:8000
```

## Example routes


Homepage with Twig (using layout)

[http://localhost:8000/](http://localhost:8000/)

Page with Twig (using layout) and passing vars to template

[http://localhost:8000/user/colyn](http://localhost:8000/user/colyn)

Page with Mustache (no layout - Mustache doesn't have layouts) and passing vars to template

[http://localhost:8000/user2/colyn](http://localhost:8000/user2/colyn)

## Install Composer (globally)

```
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```
