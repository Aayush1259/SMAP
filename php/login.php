<?php

require '../vendor/autoload.php';

use MongoDB\Client;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $uri = getenv('MONGODB_URI');

    $client = new Client($uri);

    $database = $client->loginpage;

    $collection = $database->signup;

    $insertResult = $collection->insertOne([
        'name' => $name,
        'email' => $email,
        'password' => $password
    ]);

    header("Location: ../signin.html");
    exit();
} else {
    echo "Invalid request method!";
}
?>
