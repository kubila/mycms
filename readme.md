## Simple Blog with a CMS written in Laravel and Vue, not finished yet but you could see the ui.

### I tend to use this project for my personal blog when it's ready.

### Install

`composer install`

#### Make sure to copy .env.example file and save it as .env and change database name with your preference.

### Create application key

`php artisan key:generate`

### Migrate the database.

`php artisan migrate`

#### Install frontend dependencies.

`npm install`

#### Make sure to create a "images" folder in "storage/app/public", copy some images to same folder. These images belong to posts. They will be assigned automatically to posts. Then run;

`php artisan storage:link`

#### Seed the database. Wait for it to finish, its big. If you encounter any errors, please seed again it should work.

`php artisan db:seed`

#### And finally run.

`npm run prod`

It should open "localhost:3000", if you want to see the admin side go to "localhost:3000/posts".
