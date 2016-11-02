<?php
header('Content-type:application/json');

    $chatIDGet = $_GET['chatID'];
    $restoreChat = $_GET['restoreChat'];
    $lastFormID = $_GET['lastFormID'];

    // when user close chat
    // $chatIDClose = $_GET['chatIDClose'];
    // $stateClose = $_GET['state'];

//$servername = "localhost";
//$username = "onlinechat";
//$password = "fB8*f3s2";
$dbname = "bikesdb";


$servername = "localhost";
//$servername = "127.0.0.1";
$username = "LeSs";
$password = "362159847159847zsewaq";

try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    $conn = new PDO("mysql:dbname=$dbname");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ////

    $ldDataGet = $conn->prepare("SELECT Chat_Text FROM liveDB WHERE Chat_ID =  '$chatIDGet' OR Chat_ID =  '$restoreChat'  OR Chat_ID =  '$lastFormID' ");

    $ldDataGet->execute();
             $clearGet = $ldDataGet->fetchColumn();
                     $newDataGet = trim(preg_replace('/\s+/', ' ', $clearGet));

    $newSend = $conn->prepare("SELECT Sender FROM liveDB WHERE Chat_ID =  '$chatIDGet' OR Chat_ID =  '$restoreChat' ");

    $newSend->execute();
             $clearWord = $newSend->fetchColumn();
                     $lastSend = trim(preg_replace('/\s+/', ' ', $clearWord));


    // if ($stateClose == "close"){
    //
    //     $closeChat = $conn->prepare("UPDATE liveDB SET state = :state WHERE Chat_ID = '$chatIDClose'  OR Chat_ID =  '$lastFormID'");
    //     $closeChat->bindParam(':state', $stateClose);
    //     $closeChat->execute();
    // }

        // to change state at close after 1 hour, now 3 minutes
    $checkState = $conn->prepare("SELECT State FROM liveDB  WHERE Chat_ID = '$chatIDGet' OR Chat_ID = '$lastFormID'");
    $checkState->execute();
             $lastState = $checkState->fetchColumn();
                     $lastStateClear = trim(preg_replace('/\s+/', ' ', $lastState));

$data['newMsgGet'] = $newDataGet;

$data['lastState'] = $lastStateClear;

$data['adminSend'] = $lastSend;
    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    }

        echo json_encode($data);

?>
