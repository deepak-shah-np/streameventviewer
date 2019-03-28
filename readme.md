# Stream Event Viewer

## Install

Stream Event Viewer can be cloned from github repository and installed. Following the procedure given below:

* git clone https://github.com/hello-deepak/streameventviewer
* cd streameventviewer
* add `127.0.0.1 streameventviewer.dev` to your `/etc/hosts` file
* change your apache host file or nginx
* restart apache server or nginx


## Run

The app can be run with the command below:

* install the application dependencies using command: `composer install`
* copy .env.example to .env and update your the database configurations
* give write permission to the storage folder using `chmod -R 777 storage`
* run migration using `php artisan migrate`
* access `http://streameventviewer.dev`
* Configure twitch in env

## Framework

The application is written in PHP based on the [Laravel](http://laravel.com) framework, current version of Laravel 
used for this project is 5.8
 

## Tools and packages


Some major PHP packages used are listed below:

* [socialiteproviders/twitch](https://socialiteproviders.netlify.com/providers/twitch.html) - for twitch login
* [romanzipp/Laravel-Twitch](https://github.com/romanzipp/Laravel-Twitch) - for twitch api


# Question Answer

* ##### How would you deploy the above on AWS? (ideally a rough architecture diagram will help)
!(https://raw.githubusercontent.com/hello-deepak/streameventviewer/branch/path/to/img.png)

