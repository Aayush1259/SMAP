<?php
require '../vendor/autoload.php'; // Include Composer's autoloader

// Establish database connection
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->loginpage->login;

// Retrieve user information from the login collection
$userInfo = $collection->findOne([], ['sort' => ['_id' => -1]]); // Assuming _id is the primary key and auto-incremented

if ($userInfo) {
    // Return user information as JSON
    echo json_encode($userInfo);
} else {
    // If no user information found, return an empty JSON object
    echo json_encode(array());
}
?>
