# Third day of Symfony

## About controllers

- The route name is always available to a controller as the $_route action parameter

## Updating symfony

While working on this, symfony2 RC5 happened. Update is really easy, just get the new `deps` and `deps.lock` files. Then run

    ./bin/vendors install --reinstall
    php app/console cache:clear

And done!
