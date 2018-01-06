#Prode
Laravel 4 Prode developed by @alegalviz (2014)

##Requirements

	PHP >= 5.4.0
	MCrypt PHP Extension

##How to install
### Step 1: Get the code
#### Option 1: Git Clone

	git clone repo folder

#### Option 2: Download the repository

    https://github.com/alegalviz/prodeinterno

### Step 2: Use Composer to install dependencies
#### Option 1: Composer is not installed globally

    cd prode
	curl -s http://getcomposer.org/installer | php
	php composer.phar install --dev
#### Option 2: Composer is installed globally

    cd prode
	composer install --dev

If you haven't already, you might want to make [composer be installed globally](http://andrewelkins.com/programming/php/setting-up-composer-globally-for-laravel-4/) for future ease of use.

Please note the use of the `--dev` flag.

Some packages used to preprocess and minify assests are required on the development environment.

When you deploy your project on a production environment you will want to upload the ***composer.lock*** file used on the development environment and only run `php composer.phar install` on the production server.

This will skip the development packages and ensure the version of the packages installed on the production server match those you developped on.

NEVER run `php composer.phar update` on your production server.

### Step 3: Configure Environments

Open ***bootstrap/start.php*** and edit the following lines to match your settings. You want to be using your machine name in Windows and your hostname in OS X and Linux (type `hostname` in terminal). Using the machine name will allow the `php artisan` command to use the right configuration files as well.

    $env = $app->detectEnvironment(array(

        'local' => array('your-local-machine-name'),
        'staging' => array('your-staging-machine-name'),
        'production' => array('your-production-machine-name'),

    ));

Modifying ***app/config/local/app.php*** will probably look something like this, as the rest of the configuration can be left to their defaults from the initial config file:

    <?php

    return array(

        'url' => 'http://myproject.local',

        'timezone' => 'UTC',

        'key' => 'YourSecretKey!!!',

        'providers' => array(
        
        [... Removed ...]
        
        /* Uncomment for use in development */
    //     'Way\Generators\GeneratorsServiceProvider', // Generators
    //     'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider', // IDE Helpers

        ),

    );

### Step 4: Configure Database

Now that you have the environment configured, you need to create a database configuration for it. Open ***app/config/local*** and edit it to match your local database settings. You can remove all the parts that you have not changed as this configuration file will be loaded over the initial one.

### Step 5: Configure Mailer

Open ***app/config/local/mail.php***. Now set the `address` and `name` from the `from` array in ***config/mail.php***. Those will be used to send account confirmation and password reset emails to the users.
If you don't set that registration will fail because it cannot send the confirmation email.

### Step 6: Populate Database
Run these commands to create and populate Users table:

	php artisan migrate
	php artisan db:seed

### Step 7: Set Encryption Key
***In app/config/app.php***

```
/*
|--------------------------------------------------------------------------
| Encryption Key
|--------------------------------------------------------------------------
|
| This key is used by the Illuminate encrypter service and should be set
| to a random, long string, otherwise these encrypted values will not
| be safe. Make sure to change it before deploying any application!
|
*/
```

	'key' => 'YourSecretKey!!!',

You can use artisan to do this

    php artisan key:generate --env=local

The `--env` option allows defining which environment you would like to apply the key generation. In our case, artisan generates your key in ***app/config/local/app.php*** and leaves ***'YourSecretKey!!!'*** in ***app/config/app.php***. Now it can be generated again when you move the project to another environment.

### Step 8: Make sure app/storage is writable by your web server.

If permissions are set correctly:

    chmod -R 775 app/storage

Should work, if not try

    chmod -R 777 app/storage

### Step 9: Start Page (Three options for proceeding)

### User login with commenting permission
Navigate to your Laravel 4 website and login at /user/login:

    username : user
    password : user

## Create a new user
Create a new user at /user/create

### Admin login
Navigate to /admin

    username: admin
    password: admin




## License

This is free software distributed under the terms of the MIT with attribution license

Copyright (c) 2018 alegalviz

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.