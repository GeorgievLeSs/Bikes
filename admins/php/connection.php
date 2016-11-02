<?php

header('Content-type:application/json');


    $chatID = $_POST['chatID'];

    // $lastMsg = $_POST['userMsg'];
    // $userSend = $_POST['userSend'];
    //
    //     $checkNewMsgID = $_POST['chatID'];



        // $rainbowAdmin = $_GET['rainbowAdmin'];

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

        // $oldData = $conn->prepare("SELECT Chat_Text FROM liveDB WHERE Chat_ID =  '$chatID' OR Chat_ID =  '$checkNewMsgID'");
    $oldData = $conn->prepare("SELECT Chat_Text FROM liveDB WHERE Chat_ID =  '$chatID'");

    $oldData->execute();
             $clearOldData = $oldData->fetchColumn();
                     $oldMsgDB = trim(preg_replace('/\s+/', ' ', $clearOldData));

    $userNames = $conn->prepare("SELECT User_Names FROM liveDB WHERE Chat_ID =  '$chatID'");

    $userNames->execute();
//
             $clearText = $userNames->fetchColumn();
                     $newUserNames = trim(preg_replace('/-/', ' ', $clearText));

       $oldText = $conn->prepare("SELECT Chat_Text FROM liveDB WHERE Chat_ID =  '$chatID'");

       $oldText->execute();
   //
                $lastText = $oldText->fetchColumn();
                        $lastMsg = trim(preg_replace('/-/', ' ', $lastText));

                      $chat_text = $oldMsgDB . '<br/>' . $newUserNames . ': ' . $lastMsg;

    $stmt = $conn->prepare("UPDATE liveDB SET Chat_Text = :chat_text WHERE Chat_ID = '$chatID'");
    $stmt->bindParam(':chat_text', $chat_text);
    $stmt->execute();
    $stmt = $conn->prepare("UPDATE liveDB SET Sender = :userSend WHERE Chat_ID = '$chatID'");
    $stmt->bindParam(':userSend', $userSend);
    $stmt->execute();
    ////
    $newSend = $conn->prepare("SELECT Sender FROM liveDB WHERE Chat_ID =  '$chatID'");

    $newSend->execute();
             $lumr = $newSend->fetchColumn();
                     $lastSend = trim(preg_replace('/\s+/', ' ', $lumr));

    $oldState = $conn->prepare("SELECT State FROM liveDB WHERE Chat_ID =  '$chatID'");

    $oldState->execute();
             $newState = $oldState->fetchColumn();

        $catchAllOpenState = $conn->prepare("SELECT * FROM  liveDB WHERE State = 'open'");
        $catchAllOpenState->execute();
        $checkEachOne = $catchAllOpenState->fetchAll();

        foreach($checkEachOne as $row){

            $checkUserTime = $row['Date'];

            $eachTimeStamp = strtotime($row['Date']);
            $setCloseForOld = strtotime("-3 minutes");

            if ($eachTimeStamp <= $setCloseForOld) {

                $closeChatByTime = $conn->prepare("UPDATE liveDB SET State = 'close' WHERE State = 'open' AND Date = '$checkUserTime'");
                $closeChatByTime->execute();
            }
        }

$data['newMsg'] = $chat_text;

$data['State'] = $newState;

$data['oldMsg'] = $oldMsgDB;
// $data['oldMsg'] = "WORK";
// $data['userSend'] = $lastSend;
$data['userSend'] = $lastSend;

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage() . " Really BAAAaaaAAAddddDDD!!! ";
    }

echo json_encode($data);
// echo "It`s not empty: " . $oldMsgDB;

?>
