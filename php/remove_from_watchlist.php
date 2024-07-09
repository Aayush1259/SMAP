<?php
session_start();

require '../vendor/autoload.php';

use MongoDB\Client;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['selected']) && !empty($_POST['selected'])) {
        $uri = getenv('MONGODB_URI');

        $client = new Client($uri);
        $db = $client->loginpage;
        $watchlistCollection = $db->watchlist;
        $loginCollection = $db->login;

        $lastEntry = $loginCollection->findOne([], ['sort' => ['_id' => -1]]);

        if ($lastEntry) {
            $name = $lastEntry['name'];
        } else {
            $name = "";
        }

        foreach ($_POST['selected'] as $selected) {
            $stock_name = $selected;

            $watchlistCollection->deleteOne(['stock_name' => $stock_name, 'name' => $name]);
        }

        header("Location: ../watchlist.php");
        exit();
    } else {
        header("Location: ../watchlist.php");
        exit();
    }
}
?>
