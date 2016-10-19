<?php


    $chatID = $_POST['chatID'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $adminNames = $FirstName . "_" . $LastName;
    $newUserNames;
    $chat_text;
    $adminNameID = $_GET['chatID'];
    
//$servername = "localhost";
//$username = "onlinechat";
//$password = "fB8*f3s2";
$dbname = "chat";
        try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn = new PDO("mysql:dbname=$dbname");
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("UPDATE onlineChat SET adminName = :adminNames WHERE chatID = '$chatID'");
    $stmt->bindParam(':adminNames', $adminNames);
    $stmt->execute();
    }
catch(PDOException $e)
    {
//    echo "Connection failed: " . $e->getMessage();
    }

