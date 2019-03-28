# Stream Event Viewer


## Framework

The application is written in PHP based on the [Laravel](http://laravel.com) framework, current version of Laravel 
used for this project is 5.8

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
* copy .env.example to .env and update your the database and twitch configuration.
* give write permission to the storage folder using `chmod -R 777 storage`
* run migration using `php artisan migrate`
* access `http://streameventviewer.dev`
 

## Tools and packages


Some major PHP packages used are listed below:

* [socialiteproviders/twitch](https://socialiteproviders.netlify.com/providers/twitch.html) - for twitch login
* [romanzipp/Laravel-Twitch](https://github.com/romanzipp/Laravel-Twitch) - for twitch api


# Question Answer

* ##### How would you deploy the above on AWS? (ideally a rough architecture diagram will help)
![0001](https://user-images.githubusercontent.com/7577697/55123172-a5e0e880-5129-11e9-9295-beb209d47adc.jpg)
 Credit :  [AWS](https://aws.amazon.com/websites/getting-started/tutorials/)
 
 * ##### Where do you see bottlenecks in your proposed architecture and how would you approach scaling this app starting from 100 reqs/day to 900MM reqs/day over 6 months?
 
         Bottleneck 
      The bottleneck problem arises when the resource is not free or it is holding by other process. I see the bottleneck in my proposed architecture in following conditions:
      * When the request increases and I dont have appropriate scalable server
      * Server with low specification which cannot handle more request at a time.
      * Monolithic architecture
      
       Scaling (100 reqs/day to 900MM reqs/day)
      Scaling means keeping the behaviour same when load increases. The approach I would take to scale from 100 res/day to 900MM reqs/day are as follows:
      * Use of microservices architecture: Each micorservice handling a small portion of code . ie we can separate the search and list functionality as different micorservice in out app.   
      * Use of scalable architecture . ie use of AWS scalable EC2 instance which handle the increased loads.
      * Scalable server : Scale out and Scale up
      * Scaling Database : Vertical and horizontal scaling
      * Use of NoSql Databases.
      * Caching :  use of redis or memchaced 
      * Codebase profiling
      * Denormalize tables from relational databases 
      * Use of latest application performance management and monitoring  tool such as newrelic, pingdodm, host-tracker and many.
      
      

 
