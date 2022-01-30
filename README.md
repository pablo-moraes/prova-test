# SOMETHING ABOUT FLOWERS
I made this project to test my frontend/backend skills and speed on develop simple projects


## Install dependencies
```
npm install
```
```
composer install
```

### Config database
If you want to use sqlite, change it:
```
DB_CONNNECTION=sqlite
```

and create ```database.sqlite``` in database/scripts/database.sqlite
You can change the script path in config/database.php

#### Seeding bees database with json data stored in ```storage/json/species.json```:
```
php artisan db:seed
```


#### Setting storage path to store uploaded images
```
php artisan storage:link
```

### Running project
```
php artisan serve
```
You can also run laravel mix to watch files
```
npm run watch
```

If you see anything that is not correct, open an issue telling me about


 
