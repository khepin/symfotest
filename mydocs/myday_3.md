# Third day of Symfony

## Updating symfony

While working on this, symfony2 RC5 happened. Update is really easy, just get the new `deps` and `deps.lock` files. Then run

    ./bin/vendors install --reinstall
    php app/console cache:clear

And done!

## About controllers

- The route name is always available to a controller as the $_route action parameter
- The whole request object can be passed to the controller (will prove useful when dealing with forms)

### The base controller class

Provides a few methods / shortcuts to access services like Doctrine, Routing etc...

## On Routing

In Twig, the urls (relatives) are generated through the `path()` function, or (absolutes) through the `url()` function. The whole routing system is very similart to the one in Symfony1

## Twig

Twig templates can include the whole result of a controller

    {% render "KhepinGolfBundle:Hello:recentScores" with { "player": player } %}

Where in that case player would be a variable object maybe of the class `Player`. Note that the action `recentScoresAction()` from `HelloController` does not need to define a specific route in this case.
__Attention__: the variable player is something to be passed to the controller action! Not directly to the template, otherwise template inclusion should be used.



