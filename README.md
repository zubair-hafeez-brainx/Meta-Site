# Project Setup


## Pull code

```
$ git@github.com:zubair-hafeez-brainx/Meta-Site.git
$ cd acmeproject
```

## Create .env
```
$ cp .env.example .env
```

## Setup .env

```
$ nano .env
```

APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=database
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

STRIPE_KEY=pk_test_51K12GoC5lvLU5Ccs3HK4vBRT67iYOeSycrpmuPfxjIrK0aX4yPxERxnkHpXwIIWnnl7s5r8iUPL01011ZySRhatL00P2bwSgsk
STRIPE_SECRET=sk_test_51K12GoC5lvLU5CcsruIEuHREGZ57qtmQHWeQ8sJEOLb8QXhtNe1GlZrH2Q1c3lmPLxrZWMmo3IOPkvvAJSD6pzyD00BP8iFLQr


### Project update

```
$ composer install
$ npm install
$ npm run prod
$ composer dumpautoload
$ php artisan migrate --seed
$ php artisan schedule:run
```

### Production
