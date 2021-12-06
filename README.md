# Project Setup


## Pull code

```
$ git clone git@bitbucket.org:acme/acmeproject.git
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

- DB_DATABASE=your_database_name
- DB_USERNAME=your_database_username
- DB_PASSWORD=your_database_password
- MAIL_USERNAME=your_mail_provider_username
- MAIL_PASSWORD=your_mail_provider_password
- CERTBOT_EMAIL=user@acme.com
- FQDN=acme.com
- OAUTH_APP_ID=YOUR_APP_ID_HERE
- OAUTH_APP_PASSWORD=YOUR_APP_PASSWORD_HERE
- OAUTH_REDIRECT_URI=http://localhost:8000/callback
- OAUTH_SCOPES='openid profile offline_access user.read calendars.read'
- OAUTH_AUTHORITY=https://login.microsoftonline.com/common
- OAUTH_AUTHORIZE_ENDPOINT=/oauth2/v2.0/authorize
- OAUTH_TOKEN_ENDPOINT=/oauth2/v2.0/token
- OAUTH_TENANT_ID
- NOP_BASE_URL=NOP_BASE_URL
- NOP_CLIENT_ID=NOP_CLIENT_ID
- NOP_CLIENT_SECRET=NOP_CLIENT_SECRET
- NOP_CALLBACK=${APP_URL}/nop
- GOOGLE_TRANSLATE_API_KEY
- SCOUT_DRIVER=elasticsearch
- ELASTICSEARCH_HOST
- NOPAPI_BASE_URL
- FTP_HOST
- FTP_USERNAME
- FTP_PASSWORD
- FTP_ROOT_DIR

- DB_CONNECTION=your_database_name
- DB_HOST=your_database_username
- DB_DATABASE=your_database_password
- DB_USERNAME=your_mail_provider_username
- DB_PASSWORD=your_mail_provider_password
- QUEUE_CONNECTION=
- SESSION_DRIVER=
- SESSION_LIFETIME=
- MEMCACHED_HOST=
- REDIS_HOST=
- REDIS_PASSWORD=
- REDIS_PORT=
- LARAVEL_ECHO_PORT=
- MAIL_MAILER=
- MAIL_HOST=
- MAIL_PORT=
- MAIL_USERNAME=
- MAIL_PASSWORD=
- MAIL_ENCRYPTION=
- MAIL_FROM_ADDRESS=
- MAIL_FROM_NAME=
- AWS_ACCESS_KEY_ID=
- AWS_SECRET_ACCESS_KEY=
- AWS_DEFAULT_REGION=
- AWS_BUCKET=
- PUSHER_APP_ID=
- PUSHER_APP_KEY=
- PUSHER_APP_SECRET=
- PUSHER_APP_CLUSTER=
- MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
- MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
- MIX_APP_NAME=
- TWILIO_ACCOUNT_SID=
- TWILIO_AUTH_TOKEN=
- TWILIO_APP_SID=
- TWILIO_SMS_FROM=
- GOOGLE_RECAPTCHA_KEY=
- GOOGLE_RECAPTCHA_SECRET=-nE487Rrirts
- CERTBOT_EMAIL=
- FQDN=localhost
- PAYPAL_USER=
- PAYPAL_PASSWORD=
- PAYPAL_SIGNATURE=
- PAYPAL_CLIENT_ID=
- PAYPAL_CLIENT_SECRET=
- CERTBOT_EMAIL=
- FQDN=
- FILESYSTEM_DRIVER=
- GOOGLE_CLIENT_ID=
- GOOGLE_CLIENT_SECRET=
- GOOGLE_REDIRECT=
- FACEBOOK_APP_ID=
- FACEBOOK_APP_SECRET=
- FACEBOOK_REDIRECT=
- BAMBUSER_API_KEY=


### Project one time setup

```
$ sudo docker-compose up -d --build
$ sudo docker-compose exec myapp bash
$ composer install
$ npm install
$ npm run prod
$ php artisan key:generate
$ php artisan migrate --seed
$ php artisan storage:link
$ php artisan schedule:run
$ sudo supervisord
```

### Project update

```
$ composer install
$ npm install
$ npm run prod
$ composer dumpautoload
$ php artisan migrate --seed
$ php artisan schedule:run
```

### Development
