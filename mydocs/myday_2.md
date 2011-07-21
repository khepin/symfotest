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

Routes can be defined as anotations directly in the controller. Change the app/config/routing.yml to:

    KhepinGolfBundle:
        resource: "@KhepinGolfBundle/Controller/HelloController.php"
        type:     annotation
        prefix:   /

The routing.yml in KhepinGolfBundle can be removed, and then in the controller, we add our annotations to the indexAction method like this:

    /**
     * @Route("/hello/{name}", name="hello")
     * @param type $name
     * @return Response 
     */

__Attention__: _Route_ here refers to the Route class, for this to work, we need to use the `use` statement to import this or use the fully qualified name to the Route class. So add the line:

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

### Create a controller

The bundle is created with a _Default_ controller, but our route is with the _Hello_ controller, so we need to create this controller. The controller is a plain PHP class, not extending anything (for now). It needs to be correctly namespaced (for autoloading). It has one public method: `indexAction($name)` that returns a `Response` object.

    <?php

    namespace Khepin\GolfBundle\Controller;

    use Symfony\Component\HttpFoundation\Response;

    class HelloController {
        
        public function indexAction($name) {
            return new Response('<html><body>Hello '.$name.'</body></html>');
        }
        
    }

### And a template

First extend the standard controller which has a shortcut method to the templating engine. The new `indexAction` becomes

    public function indexAction($name) {
        $this->render("KhepinGolfBundle:Hello:index.html.twig", array('name' => $name));
    }

In the bundle's resource folder add a Hello folder containing `index.html.twig`, then this file contains:

    <html>
        <body>
            Hello {{ name }}!
        </body>
    </html>

Or to make use of the standard layout already defined:

    {% extends '::base.html.twig' %}

    {% block body %}
        Hello {{ name }}!
    {% endblock %}
















