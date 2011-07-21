# Second day with symfony2

## First page

### Create a bundle

    php app/console generate:bundle --namespace="Khepin/GolfBundle" --format=yml

Brings a dynamic command line app to guide through bundle creation. It now also automatically updates the AppKernel.php in the `app/` directory. Also adds the resource inclusion in the `app/config/routing.yml` file. (The routing file update failed for me). Starting the same command with no parameters set works and gets through the same process but with no default value.


The line that was added in AppKernel.php is:

    new Khepin\GolfBundle\KhepinGolfBundle(),

In routing since it didn't work we need to add:

    AcmeHelloBundle:
        resource: "@AcmeHelloBundle/Resources/config/routing.yml"
        prefix:   /

Then add a route to the bundle's routing file:

    hello:
        pattern:  /hello/{name}
        defaults: { _controller: KhepinGolfBundle:Hello:index }



