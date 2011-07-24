# Fourth day with Symfony2 - Doctrine

## Creating the DB

Running the config has set the DB parameters in the `/app/config/parameters.ini` file. Doctrine can then create the DB through command line:

    php app/console doctrine:database:create

## The model

### A basic entity class

Created in the Entity namespace of a bundle. Can be created by hand or through command line:

    php app/console doctrine:generate:entity

This will bring up a prompt input guiding you through the Entity creation process. It will generate the Entity class, with all annotations (provided this was the chosen format) set, as well as standard __getters__ and __setters__. It also adds an __id__ field.


Then Doctrine can auto-create the tables based on the mapping information in the annotations. To directly update the database, use `--force`, or it will only dump the corresponding SQL to a file.

    php app/console doctrine:schema:update


### Persisting objects (Entity Manager)

If the controller extends the standard symfony controller, the EntityManager can be accessed through

    $em = $this->getDoctrine()->getEntityManager();

An entity (that is being created, not one that was retrieved from the DB because this one would already be in the EntityManager) can be set to be managed through:

    $em->persist($my_entity);

All changes can be made to the entity manager before actually impacting the DB. The DB will only be impacted when the EntityManager is asked to:

    $em->flush();

To retrieve objects, we use repository classes, to get the one for products: 

    $p = $this->getDoctrine()->getRepository('KhepinStoreBundle:Product')->find($id)
    if(!$p){
        throw $this->createNotFoundException('We didn't find your shit!');
    }

The `findByXxxx()` methods can still be used like in symfony1. The _Table_ classes from symfony1 have an equivalent that are the _Repository_ classes. Setting the `repositoryClass` parameter of the `@Entity` annotation to the fully namespaced class allows for automatic generation of the repository class in the command line:

    php app/console doctrine:generate:entities Namespace

### Related classes

#### One to many

On the _One_ side is defined by the annotation:

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     * @var type 
     */
    private $products;
    
    public function __construct(){
        $this->products = new ArrayCollection();
    }

And the _products_ property has to be set to an `ArrayCollection` in the constructor.


On the _Many_ side, it is set through the annotation:

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id");
     * @var type 
     */
    private $category;

So the relation is set by _ManyToOne_ while the actual SQL table properties are defined through the _JoinColumn_.


While setting new related objects, all of them need to be _persisted_ through the _EntityManager_. To get related objects altogether in one single query, the actual query needs to be written, Doctrine will lazy load them through another request if needed, but to join and load them in one single query, this has to be done manually.

# Fourth day with Symfony2 - Testing






















