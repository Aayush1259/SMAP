<?php
session_start(); // Start the session to access session variables

require '../vendor/autoload.php'; // Include Composer's autoloader

use MongoDB\Client;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if selected checkboxes exist and if any checkboxes are selected
    if (isset($_POST['selected']) && !empty($_POST['selected'])) {
        // Establish MongoDB connection
        $client = new Client("mongodb://localhost:27017");
        $db = $client->loginpage;
        $watchlistCollection = $db->watchlist;
        $loginCollection = $db->login;

        // Get the name from the last entry in the login collection
        $lastEntry = $loginCollection->findOne([], ['sort' => ['_id' => -1]]);

        if ($lastEntry) {
            $name = $lastEntry['name'];
        } else {
            $name = ""; // or any default value
        }

        // Get the user_id from the session
        $user_id = $_SESSION['name'];

        // Loop through selected checkboxes and delete the corresponding items
        foreach ($_POST['selected'] as $selected) {
            $stock_name = $selected;

            // Delete the document from the watchlist collection
            $watchlistCollection->deleteOne(['stock_name' => $stock_name, 'name' => $name]);
        }

        // Redirect back to the page where the form was submitted
        header("Location: ../watchlist.php");
        exit();
    } else {
        // If no checkboxes are selected, you can redirect back to the page or perform any other action
        header("Location: ../watchlist.php");
        exit();
    }
}
?>
