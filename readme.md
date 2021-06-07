## Install

 - install Docker
 
 #### in terminal 
 - run `docker-compose build`
 - run `docker-compose up`
 - run `docker exec -it mvc_app_1 bash`
 
 #### in docker bash
 - run `composer install`
 - run `composer createdb`
 
 #### in browser
 - goto `localhost:8088`
 
 ## Bugs
  - the same strings in category evaluate to different when deconstructing CSV in `app/Controllers/csv.php`