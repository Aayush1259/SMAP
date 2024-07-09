<?php
// Include MongoDB library
require '../vendor/autoload.php';

use MongoDB\Client;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Connect to MongoDB
    $client = new Client("mongodb://localhost:27017");

    // Select the database
    $database = $client->loginpage;

    // Select the collection
    $collection = $database->signup;

    // Find the user
    $user = $collection->findOne(['name' => $name, 'password' => $password]);

    if ($user) {
        $email = $user['email'];

        // Insert login details
        $loginCollection = $database->login;
        $loginCollection->insertOne([
            'name' => $name,
            'password' => $password,
            'email' => $email
        ]);

        // Redirect to index2.html upon successful login
        header("Location: ../index2.html");
        exit(); // Stop further execution
    } else {
        // Display alert message using JavaScript
        echo '<script type="text/javascript">
                alert("User not registered. Please sign up first.");
                window.location.href = "../signin.html";
                </script>';
        exit(); // Stop further execution
    }
} else {
    echo "Invalid request method!";
}
?>
