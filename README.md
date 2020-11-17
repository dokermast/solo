git clone https://github.com/dokermast/solo.git

composer install

create & set .env

php artisan key:generate

php artisan jwt:secret

create database

php artisan migrate

php artisan db:seed


register            POST     /register               {form-data} 'login', 'password'

login               POST     /login                  {form-data} 'login', 'password'

====== use Bearer Token ==================================================================

refresh             GET      /refresh

get users bots       GET     /bots

get users bot        GET     /bot/{id}

create users bot     POST    /bots                   {form-data} 'name', 'description'

update users bot     PUT     /bots/{id}              {form-data} 'name' && || 'description'

delete users bot     DELETE  /bots/{id}
