<?php

// header('Content-type:application/json');

    $chatIDGet = $_GET['chatID'];

$dbname = "bikesdb";
$servername = "localhost";

$username = "LeSs";
$password = "362159847159847zsewaq";
        try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // $conn = new PDO("mysql:dbname=$dbname");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $closeChatByTime = $conn->prepare("UPDATE liveDB SET State = 'close' WHERE State = 'open' AND Chat_ID = '$chatIDGet'");
          $closeChatByTime->execute();
        }
        catch(PDOException $e) {
//             echo "Error: " . $e->getMessage();
        }

?>
