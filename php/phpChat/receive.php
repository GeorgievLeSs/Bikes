<?php
header('Content-type:application/json');

    $chatIDGet = $_GET['chatID'];
    $restoreChat = $_GET['restoreChat'];
    $lastFormID = $_GET['lastFormID'];
    
    // when user close chat
    $chatIDClose = $_GET['chatIDClose'];
    $stateClose = $_GET['state'];
    
//$servername = "localhost";
//$username = "onlinechat";
//$password = "fB8*f3s2";
$dbname = "chat";

try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn = new PDO("mysql:dbname=$dbname");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ////

    $ldDataGet = $conn->prepare("SELECT chat_Text FROM onlineChat WHERE chatID =  '$chatIDGet' OR chatID =  '$restoreChat'  OR chatID =  '$lastFormID' ");

    $ldDataGet->execute();
             $clearGet = $ldDataGet->fetchColumn();  
                     $newDataGet = trim(preg_replace('/\s+/', ' ', $clearGet));
                             
    $newSend = $conn->prepare("SELECT userSend FROM onlineChat WHERE chatID =  '$chatIDGet' OR chatID =  '$restoreChat' ");
    
    $newSend->execute();
             $clearWord = $newSend->fetchColumn();  
                     $lastSend = trim(preg_replace('/\s+/', ' ', $clearWord));
                     
                     
    if ($stateClose == "close"){
        
        $closeChat = $conn->prepare("UPDATE onlineChat SET state = :state WHERE chatID = '$chatIDClose'  OR chatID =  '$lastFormID'");
        $closeChat->bindParam(':state', $stateClose);
        $closeChat->execute();
    }
    
        // to change state at close after 1 hour, now 3 minutes
    $checkState = $conn->prepare("SELECT state FROM onlineChat  WHERE chatID = '$chatIDGet' OR chatID = '$lastFormID'");
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
