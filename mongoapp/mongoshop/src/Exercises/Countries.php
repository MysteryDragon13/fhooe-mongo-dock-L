<?php
namespace Exercises;

use Utilities\Utilities;
use MongoDB\Client;
use MongoDB\BSON\ObjectId;

/*
 * The class Country implements a form for managing Countries at MongoShop.
 *
 * If country data are valid, they are stored in the collection test.country.
 * A List of countries ist displayed below the input form.
 *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 */
final class Countries
{
    /**
     * @var array messages is used to display error and status messages after a form was sent an validated
     */
    private array $messages = [];

    /**
     * @var object twig provides a Twig object to display hmtl templates
     */
    private object $twig;

    /**
     * @var array twigParams is used to set variables passed to Twig
     */
    private array $twigParams = [];

    /**
     * @var object connection provides a object for a connection to mongodb.
     */
    private object $connection;

    /**
     * @var object db_test provides an object to access the database test.
     */
    private object $db_test;

    /**
     * @var object $countries provides an object to access the collection countries.
     */
    private object $countries;

    /**
     * Countries Constructor.
     *
     * Initializes Twig
     * Creates a database handler for the database connection.
     */
    public function __construct($twig)
    {
        $this->twig=$twig;
        $database = (new Client('mongodb://mongo:27017/'))->test;
        //$cursor = $database->command(['ping' => 1]);
        //var_dump($cursor->toArray()[0]);
        $this->countries = $database->countries;
    }

    /**
     * Set route and fill the Country list below form
     * Display Country page
     *
     * @param string $route
     * @return void
     */
    public function displayForm(string $route = "/createcountry"): void
    {
        $this->twigParams['route'] = $route;
        $this->twigParams['countries'] = $this->fillCountryArray();
        $this->twig->display("countries.html.twig", $this->twigParams);
    }

    /**
     * Returns all entries of the collection test.countries in an array.
     *
     * @return mixed Array with rows of collection test.countries. false in case of error
     */
    private function fillCountryArray(): array
    {
        $result = [];
        foreach ($this->countries->find() as $bsonDocument) {
            $result[] = [
                'cid' => $bsonDocument['_id']->__toString(),
                'country' => $bsonDocument['country'],
                'isocode' => $bsonDocument['isocode']
            ];
        }
        return $result;
    }

    /**
     * Validate and process country data, sent with a POST request.
     *
     * @return void Returns nothing
     */
    public function insertCountry(): void
    {
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $countryName = $_POST['country'];
            $isocode = $_POST['isocode'];

            if (strlen($isocode)>3) {
                $this->twigParams['messages']['error'] = "Isocode should have a maximum of 3 characters";
            } else {
                $countryDocument = [
                    'country' => $countryName,
                    'isocode' => $isocode
                ];

                try {
                    $insertOneResult = $this->countries->insertOne($countryDocument);
                    if ($insertOneResult->getInsertedCount()>0) {
                        $this->twigParams['messages']['status'] = "Country with _id " . $insertOneResult->getInsertedId() . " inserted";
                    } else {
                        $this->twigParams['messages']['error'] = "Failed to insert country";
                    }
                } catch (\Exception $e) {
                    $this->twigParams['messages']['error'] = "MongoDB insertion failed. Error message: " . $e->getMessage();
                }
            }
        } else {
            $this->twigParams['messages']['error'] = "Invalid request method";
        }

        $this->displayForm();
    }

    /**
     * Validate and process country data, sent with a POST request
     * First step is to call form with a GET request and provide data for given uid
     * Second step is to send POST with changed data
     * These steps are closely related and therefore handled within one method
     *
     * @return void Returns nothing
     */
    public function updateCountry(): void
    {
        //TODO display form with given cid
        // update country sent with GET request



        isset($_GET['cid']) ? print_r("GET['cid']: " . $_GET['cid']) : null;
        isset($_POST['cid']) ? print_r("POST['cid']: " . $_POST['cid']) : null;
        $this->displayForm("/updatecountry");
    }

    /**
     * Returns keys needed for update form of the collection test.countries in an array.
     *
     * @return mixed Array that returns rows of test.countries. false in case of error
     */
    private function getCountryFields(): array
    {
        $result = [];
        //TODO return selected country data to form input fields
        return $result;
    }

    /**
     * Deletes a country identified by his cid from the collection test.countries.
     *
     * @return void Return nothing
     */
    public function deleteCountry(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $selectedCountryId = $_POST['countryToDelete'];
            $objectId = new ObjectId($selectedCountryId);
            $deleteResult  = $this->countries->deleteOne(['_id' => $objectId]);
            if($deleteResult->getDeletedCount()>0) {
                echo "Country deleted successfully.";
                $this->twigParams['messages']['status'] = $deleteResult->getDeletedCount() . " country deleted";
            } else {
                echo "No matching record found for deletion.";
            }
        } elseif ($_SERVER['REQUEST_METHOD'] === "GET") {
            $countriesData = $this->countries->fillCountryArray();
            $this->twigParams['countries'] = $countriesData;
        }
        $this->displayForm();
    }

    /**
     * Validates the user input
     *
     * name of country and isocode are validated with a regex. You can use Utilities::isString() to do so.
     *
     * Error messages are stored in the array $messages[].
     *
     * @return bool Returns true if user input is valid, otherwise false.
     */
    private function isValid(): bool
    {
        if (Utilities::isEmptyString($_POST['country'])) {
            $this->messages['email'] = "Please enter a country.";
        }
        if (Utilities::isEmptyString($_POST['isocode'])) {
            $this->messages['name'] = "Please enter the related isocode.";
        }
        if ((count($this->messages) === 0)) {
            return true;
        } else {
            $this->twigParams['messages'] = $this->messages;
            return false;
        }
    }
}
