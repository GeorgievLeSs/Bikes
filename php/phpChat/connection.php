<?php
 
header('Content-type:application/json');


    $chatID = $_POST['chatID'];
    
    $lastMsg = $_POST['userMsg'];
    $userSend = $_POST['userSend'];
    
    $checkNewMsgID = $_GET['chatID'];
    $rainbowAdmin = $_GET['rainbowAdmin'];

//$servername = "localhost";
//$username = "onlinechat";
//$password = "fB8*f3s2";
$dbname = "chat";

try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn = new PDO("mysql:dbname=$dbname");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ////
    $oldData = $conn->prepare("SELECT chat_Text FROM onlineChat WHERE chatID =  '$chatID' OR chatID =  '$checkNewMsgID'");
    
    $oldData->execute();
             $clearOldData = $oldData->fetchColumn();  
                     $oldMsgDB = trim(preg_replace('/\s+/', ' ', $clearOldData));
                     
    $userNames = $conn->prepare("SELECT user_names FROM onlineChat WHERE chatID =  '$chatID'  OR chatID =  '$checkNewMsgID'");
    
    $userNames->execute();
//    
             $clearText = $userNames->fetchColumn();  
                     $newUserNames = trim(preg_replace('/-/', ' ', $clearText));
                    
                      
                      $chat_text = $oldMsgDB . '<br/>' . $newUserNames . ': ' . $lastMsg;
                      
    $stmt = $conn->prepare("UPDATE onlineChat SET chat_Text = :chat_text WHERE chatID = '$chatID'");
    $stmt->bindParam(':chat_text', $chat_text);
    $stmt->execute();
    $stmt = $conn->prepare("UPDATE onlineChat SET userSend = :userSend WHERE chatID = '$chatID'");
    $stmt->bindParam(':userSend', $userSend);
    $stmt->execute();
    ////
    $newSend = $conn->prepare("SELECT userSend FROM onlineChat WHERE chatID =  '$checkNewMsgID'");
    
    $newSend->execute();
             $lumr = $newSend->fetchColumn();  
                     $lastSend = trim(preg_replace('/\s+/', ' ', $lumr));
                     
    $state = $conn->prepare("SELECT state FROM onlineChat WHERE chatID =  '$chatID'  OR chatID =  '$checkNewMsgID'");
    
    $state->execute();
             $newState = $state->fetchColumn();  
             
             
        $catchAllOpenState = $conn->prepare("SELECT * FROM  onlineChat WHERE state='open'");
        $catchAllOpenState->execute();
        $checkEachOne = $catchAllOpenState->fetchAll();
        
        foreach($checkEachOne as $row){
            
            $checkUserTime = $row['reg_date'];
            
            $eachTimeStamp = strtotime($row['reg_date']);
            $setCloseForOld = strtotime("-3 minutes");

            if ($eachTimeStamp <= $setCloseForOld) {

                $closeChatByTime = $conn->prepare("UPDATE onlineChat SET state = 'close' WHERE state = 'open' AND reg_date = '$checkUserTime'");
                $closeChatByTime->execute();
            }
        }
    
$data['newMsg'] = $chat_text;

$data['state'] = $newState;
                     
$data['oldMsg'] = $oldMsgDB;
$data['userSend'] = $lastSend;

    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    }

echo json_encode($data);

?>