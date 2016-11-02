<?php

header('Content-type:application/json');

    $chatID = $_POST['chatID'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $adminNames = $FirstName . "_" . $LastName;
    $newUserNames;
    $chat_text;
    // $adminNameID = $_GET['chatID'];

$servername = "localhost";
//$servername = "127.0.0.1";
$username = "LeSs";
$password = "362159847159847zsewaq";
$dbname = "bikesdb";

        try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // $conn = new PDO("mysql:dbname=$dbname");

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("UPDATE liveDB SET Admin_ID = :adminNames WHERE Chat_ID = '$chatID'");
    $stmt->bindParam(':adminNames', $adminNames);
    $stmt->execute();
    $data['adminID'] = $chatID;
    }
      catch(PDOException $e)
    {
   echo "Connection failed: " . $e->getMessage();
    }

            echo json_encode($data);
