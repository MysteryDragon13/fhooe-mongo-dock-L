<?php

namespace Exercises;

use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use MongoDB\BSON\ObjectId;
use MongoDB\Client;
use Utilities\Utilities;
use Documents\User;

class MongoDoctrine
{
    /**
     * @var array messages is used to display error and status messages after a form was sent an validated
     */
    private array $messages = [];

    /**
     * @var object twig provides a Twig object to display hmtl templates
     */
    private object $twig;
    private object $dm;

    /**
     * @var array twigParams is used to set variables passed to Twig
     */
    private array $twigParams = [];

    /**
     * MongoCRUD constructor.
     *
     * Initializes Twig
     * Creates a database handler for the database connection.
     */
    public function __construct($twig)
    {
        $this->twig=$twig;
        $this->initDB();
    }

    private function initDB()
    {

        $client = new Client('mongodb://mongo:27017', [], ['typeMap' => DocumentManager::CLIENT_TYPEMAP]);
        /* simple test for database connection to database test
        $database = $client->test;
        $cursor = $database->command(['ping' => 1]);
        var_dump($cursor->toArray()[0]);
        ## */
        $config = new Configuration();
        $config->setProxyDir('../proxies');
        $config->setProxyNamespace('Proxies');
        $config->setHydratorDir('../hydrators');
        $config->setHydratorNamespace('Hydrators');
        $config->setMetadataDriverImpl(AnnotationDriver::create('../src/Documents'));
        // You can use the next line to set defaultDB or you can set it with Annotations in ../src/Documents/<classfile>
        //$config->setDefaultDB('test');

        $this->dm = DocumentManager::create($client, $config);
        // $this->dm = DocumentManager::create(null, $config);
        spl_autoload_register($config->getProxyManagerConfiguration()->getProxyAutoloader());
    }

    public function displayForm(string $route = "/create_user"): void
    {
        $this->twigParams['route'] = $route;
        $this->twigParams['users'] = $this->fillUsersArray();
        $this->twig->display("mongodoctrine.html.twig", $this->twigParams);
    }

    /**
     * Returns all emails of the collection test.users in an array.
     *
     * @return mixed Array that returns rows of test.users. false in case of error
     */
    public function fillUsersArray(): array
    {
        //TODO Add '_id' to select and the $users[] array. DONE
        $result = $this->dm->createQueryBuilder(User::class)
            ->select('_id','email', 'name')
            ->hydrate(false) // return an array instead of an object
            ->getQuery()
            ->execute();
        foreach ($result as $key => $value) {
            $users[]= ['_id' => $value['_id'],'email' => $value['email'],'name' => $value['name']];
        }
        // $users[]= ['_id' => 'asdfasdfadsfasdf', 'email' => 'shopuser1@mongoshop.at', 'name' => 'Shop User1'];
        if (isset($users)) {
            return $users;
        } else {
            return [];
        }

    }

    /**
     * Validate and process user input, sent with a POST request.
     *
     * @return void Returns nothing
     */
    public function insertUser(): void
    {
        if ($this->isValid()) {
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setName($_POST['name']);
            $this->dm->persist($user);
            $this->dm->flush();
            $this->twigParams['messages']['status'] = "User " . $user->getName() .", " . $user->getEmail() . " with " . $user->getId() . "  inserted";
        } else {
            $this->twigParams['email'] = $_POST['email'];
            $this->twigParams['name'] = $_POST['name'];
        }
        $this->displayForm();
    }

    /**
     * Validates the user input
     *
     * All fields are required.
     *
     * @return bool Returns true if input is valid, otherwise false.
     *
     * Error messages are stored in the array $messages[].
     *
     * Price can be validated with Utilities::isPrice().
     */
    private function isValid(): bool
    {
        if (Utilities::isEmptyString($_POST['email'])) {
            $this->messages['email'] = "Please enter your email.";
        }
        if (!Utilities::isEmptyString($_POST['email']) && !Utilities::isEmail($_POST['email'])) {
            $this->messages['email'] = "Please enter a valid email.";
        }
        if (Utilities::isEmptyString($_POST['name'])) {
            $this->messages['name'] = "Please enter your name.";
        }
        if ((count($this->messages) === 0)) {
            return true;
        } else {
            $this->twigParams['messages'] = $this->messages;
            return false;
        }
    }

    /**
     * Validate and process user input, sent with a POST request.
     *
     * @return void Returns nothing
     */
    public function updateUser(): void
    {
        //TODO display data sent by a GET request and update them with a POST request
        //TODO See MongoCRUD example for this
        //DONE
        if($_SERVER['REQUEST_METHOD']==='GET'){
            $uid=$_GET['uid'];
            $this->twigParams['uid']['oid']=$uid;
            $user = $this->dm->find(User::class, $uid);
            $this->twigParams['email']=$user->getEmail();
            $this->twigParams['name']=$user->getName();
            $this->displayForm("/update_user");
        }else{//if POST
            $uid=array_keys($_POST['uid']);
            if($this->isValid()){
                $userid=new ObjectId($uid[0]);
                $user=$this->dm->find(User::class,$userid);
                $user->setEmail($_POST['email']);
                $user->setName($_POST['name']);
                $this->dm->persist($user);
                $this->dm->flush();
                $this->displayForm();
            }else{

                $this->twigParams['uid']['oid']=$uid[0];
                $this->twigParams['email']=$_POST['email'];
                $this->twigParams['name']=$_POST['name'];
            }
        }
    }

    /**
     * Delete user, sent with a GET request.
     *
     * @return void Returns nothing
     */
    public function deleteUser(): void
    {
        //TODO use _id sent bei GET-request DONE
        if($_SERVER['REQUEST_METHOD']==='GET'){
            $uid=new ObjectId($_GET['uid']);
            $user = $this->dm->find(User::class, $uid);
            $this->dm->remove($user);
            $this->dm->flush();

        }//optional warning here

        $this->displayForm();
    }
}