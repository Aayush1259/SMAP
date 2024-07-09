<?php

require '../vendor/autoload.php';

use MongoDB\Client;

$uri = getenv('MONGODB_URI');

$client = new Client($uri);
$db = $client->loginpage;
$loginCollection = $db->login;
$watchlistCollection = $db->watchlist;

$lastLogin = $loginCollection->findOne([], ['sort' => ['_id' => -1]]);

if ($lastLogin) {
    $last_logged_in_user = $lastLogin['name'];

    $stock_names_full_names = array(
        "AAPL" => "Apple Inc.",
        "GOOGL" => "Google Inc.",
        "MSFT" => "Microsoft Corporation",
        "TSLA" => "Tesla Inc.",
        "AMZN" => "Amazon Inc.",
        "RELIANCE.NS" => "Reliance Industries Ltd.",
        "TCS.NS" => "Tata Consulting Services",
        "INFY.NS" => "Infosys Ltd.",
        "SBIN.NS" => "State Bank of India",
        "HDFCBANK.NS" => "HDFC Bank Ltd."
    );

    $watchlistCursor = $watchlistCollection->find(['name' => $last_logged_in_user]);

    if ($watchlistCursor->isDead()) {
        echo "<p class='message'>There are currently no Stocks in your Watchlist!</p>";
        echo "<br>";
        echo "<p class='message'>Please Redirect to the Home Page and Add Stocks to your Watchlist.</p>";
    } else {
        echo "<form method='post' action='./php/remove_from_watchlist.php'>";
        echo "<table>
            <tr>
                <th>S. No.</th>
                <th>Logo</th>
                <th>Symbol</th>
                <th>Stock Name</th>
                <th>Select</th>
            </tr>";

        $serial_number = 1;
        foreach ($watchlistCursor as $row_watchlist) {
            $stock_name = $row_watchlist['stock_name'];
            $full_name = isset($stock_names_full_names[$stock_name]) ? $stock_names_full_names[$stock_name] : "Unknown";

            echo "<tr>";
            echo "<td>" . $serial_number . "</td>";
            $image_path = "HOME/" . strtolower($stock_name) . ".png";
            echo "<td><img src='$image_path' alt='$full_name'></td>";
            echo "<td>" . $stock_name . "</td>";
            echo "<td>" . $full_name . "</td>";
            echo "<td><input type='checkbox' name='selected[]' value='" . $stock_name . "'></td>";
            echo "</tr>";

            $serial_number++;
        }
        echo "</table>";
        echo "<br><br>";
        echo "<input type='submit' value='Remove from Watchlist' class='submit2'>";
        echo "</form>";
    }
} else {
    echo "<p class='message'>No users logged in.</p>";
}
?>
