#!/bin/sh
set -e

echo "Deploying application ..."

# Enter maintenance mode
(php artisan down --message 'The app is being (quickly!) updated. Please try again in a minute.') || true
    # Update codebase
    git fetch origin deploy
    git reset --hard origin/deploy

    # Install dependencies based on lock file
    composer install --no-interaction --prefer-dist --optimize-autoloader

    # Migrate database
    php artisan migrate --force

    # Note: If you're using queue workers, this is the place to restart them.
    # ...

    # Clear cache
    php artisan optimize

    # Reload PHP to update opcache
    echo "" | sudo -S service php7.4-fpm reload
# Exit maintenance mode
php artisan up

echo "Application deployed!"
#
#The process explained:
#
#We’re putting the application into maintenance mode and showing a sensible message to the users.
#We’re fetching the deploy branch and hard resetting the local branch to the fetched version.
#We’re updating composer dependencies based on the lock file. Make sure your composer.lock file is in your repository, and not part of your .gitignore. It makes sure the production environment uses the exact same version of packages as your local environment.
#We’re running database migrations.
#We’re updating Laravel & php-fpm caches. If you’re not using PHP 7.4, change the version in that command.
#We’re putting the server back up.
#Note that the server is always on the deploy branch. Also note that we’re putting the server down for the shortest duration possible — only for the composer install, migrations and cache updating. The app needs to go down to avoid requests coming in when the codebase and database are not in sync — it would be irresponsible to simply run those commands without putting the server into maintenance mode first.
#
#And a final note, the reason we’re wrapping the php artisan down command in (...) || true is that deployments sometimes go wrong. And the down command exits with 1 if the application is already down, which would make it impossible to deploy fixes after the previous deployment errored halfway through.
