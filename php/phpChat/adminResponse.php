<?php
header('Content-type:application/json');


    $chatID = $_POST['chatID'];
    $lastMsg = $_POST['userMsg'];
    $adminSend = $_POST['adminSend'];

//$servername = "localhost";
//$username = "onlinechat";
//$password = "fB8*f3s2";
$dbname = "chat";
        try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn = new PDO("mysql:dbname=$dbname");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $oldData = $conn->prepare("SELECT chat_Text FROM onlineChat WHERE chatID =  '$chatID' OR chatID =  '$checkNewMsgID'");
    
    $oldData->execute();
            $clearText = $oldData->fetchColumn();  
        $oldText = trim(preg_replace('/\s+/', ' ', $clearText));
                     
            $chat_text = $oldText . '<br/>' . "Support Rainbow" . ': ' . $lastMsg;
                      
    $stmt = $conn->prepare("UPDATE onlineChat SET chat_Text = :chat_text WHERE chatID = '$chatID'");
    $stmt->bindParam(':chat_text', $chat_text);
    $stmt->execute();
    ////
    $stmt = $conn->prepare("UPDATE onlineChat SET userSend = :userSend WHERE chatID = '$chatID'");
    $stmt->bindParam(':userSend', $adminSend);
    $stmt->execute();
    
$data['newMsg'] = $chat_text;

    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    }

echo json_encode($data);

?>
