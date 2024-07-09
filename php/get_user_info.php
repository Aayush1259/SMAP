<?php
require 'vendor/autoload.php';

use MongoDB\Client;

$uri = getenv('MONGODB_URI');

$client = new Client($uri);
$collection = $client->loginpage->login;

$userInfo = $collection->findOne([], ['sort' => ['_id' => -1]]); 

if ($userInfo) {
    echo json_encode($userInfo);
} else {
    echo json_encode(array());
}
?>
