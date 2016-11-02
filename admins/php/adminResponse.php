<?php

header('Content-type:application/json');


    $chatID = $_POST['chatID'];
    $lastMsg = $_POST['userMsg'];
    $adminSend = $_POST['adminSend'];

  $servername = "localhost";
  $username = "LeSs";
  $password = "362159847159847zsewaq";
  $dbname = "bikesdb";

        try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $oldData = $conn->prepare("SELECT Chat_Text FROM liveDB WHERE Chat_ID =  '$chatID'");

    $oldData->execute();

            $clearText = $oldData->fetchColumn();
        $oldText = trim(preg_replace('/\s+/', ' ', $clearText));

            $chat_text = $oldText . '<br/>' . "Support Team" . ': ' . $lastMsg;

    $stmt = $conn->prepare("UPDATE liveDB SET Chat_Text = :chat_text WHERE Chat_ID = '$chatID'");
      $stmt->bindParam(':chat_text', $chat_text);
      $stmt->execute();
    ////
    $stmt = $conn->prepare("UPDATE liveDB SET Sender = :userSend WHERE Chat_ID = '$chatID'");
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
