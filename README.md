# urlsauce.com
A web application developed with Laravel 5.2 that generates shortened urls.

###Installation on Local Machine
Prerequisites: Laravel homestead empty project installed and configured

Get .git folder into project folder
```
cd ~/brandNewEmptyLaravel5.2Project
git clone https://github.com/HomerGaidarski/urlsauce
sudo mv urlsauce/.git .git
```

Fetch urlsauce code
```
git fetch --all
git reset --hard origin/master
```

Configure your .env file
```
cp .env.example .env
vim .env
```

Change the following lines with your homestead database credentials (if you used the defaults you can skip this step)
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USENAME=homestead
DB_PASSWORD=secret
```

Create database tables from migrations

`php artisan migrate`

You should now be able to visit http://homestead.app (or wherever you mapped your laravel project to)
