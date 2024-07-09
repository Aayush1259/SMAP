<?php

require '../vendor/autoload.php';

use MongoDB\Client;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $uri = getenv('MONGODB_URI');

    $client = new Client($uri);

    $database = $client->loginpage;

    $collection = $database->signup;

    $user = $collection->findOne(['name' => $name, 'password' => $password]);

    if ($user) {
        $email = $user['email'];

        $loginCollection = $database->login;
        $loginCollection->insertOne([
            'name' => $name,
            'password' => $password,
            'email' => $email
        ]);

        header("Location: ../index2.html");
        exit();
    } else {
        echo '<script type="text/javascript">
                alert("User not registered. Please sign up first.");
                window.location.href = "../signin.html";
                </script>';
        exit();
    }
} else {
    echo "Invalid request method!";
}
?>
