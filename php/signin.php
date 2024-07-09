<?php
// Include MongoDB library
require '../vendor/autoload.php';

use MongoDB\Client;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to MongoDB
    $client = new Client("mongodb://localhost:27017");

    // Select the database
    $database = $client->loginpage;

    // Select the collection
    $collection = $database->signup;

    // Insert the new user
    $insertResult = $collection->insertOne([
        'name' => $name,
        'email' => $email,
        'password' => $password
    ]);

    // Redirect to signin.html upon successful signup
    header("Location: ../signin.html");
    exit(); // Ensure no further execution after redirection
} else {
    echo "Invalid request method!";
}
?>
