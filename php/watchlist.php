<?php
// Include Composer's autoloader
require '../vendor/autoload.php';

use MongoDB\Client;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish MongoDB connection
    $client = new Client("mongodb://localhost:27017");
    $db = $client->loginpage;
    $watchlistCollection = $db->watchlist;
    $loginCollection = $db->login;

    // Process selected images
    if (isset($_POST['images'])) {
        // Retrieve the last entry from the login collection to get the username of the logged-in user
        $lastLogin = $loginCollection->findOne([], ['sort' => ['_id' => -1]]);
        $username = $lastLogin ? $lastLogin['name'] : '';

        foreach ($_POST['images'] as $stock_name) {
            // Check if the stock_name already exists in the watchlist collection for the user
            $existingEntry = $watchlistCollection->findOne(['stock_name' => $stock_name, 'name' => $username]);

            if (!$existingEntry) {
                // Insert stock name and username into the database
                $insertResult = $watchlistCollection->insertOne([
                    'stock_name' => $stock_name,
                    'name' => $username
                ]);

                if ($insertResult->getInsertedCount() > 0) {
                    // Insertion successful
                } else {
                    echo "Error: Unable to insert $stock_name into the watchlist.<br>";
                }
            } else {
                echo "Stock '$stock_name' is already in the watchlist for user '$username'.<br>";
            }
        }
    }

    // Refresh the current page
    header("Location: ../watchlist.php");
    exit();
}
?>
