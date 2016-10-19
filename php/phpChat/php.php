<?php

//
$SEND_FORM = true;
$log_file = 'chat_form_data.xml';
$redirect_data = array();    
$result_post = print_r($_POST, true); 

array_push($redirect_data, $_POST);
$result_redirect = print_r($redirect_data, true);
    file_put_contents($log_file, "<redirect>\n$result_redirect \n</redirect>\n", FILE_APPEND);
    


//$servername = "localhost";
$servername = "localhost";
$username = "moon";
$password = "362159847";
$dbname = "chat";
//    host=127.0.0.1:3306;
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $state = 'open';   
    $adminName = 'wait';   
    
    $userNames = $FirstName . ' ' . $LastName;
    

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    $conn = new PDO("mysql:host=$servername; dbname=$dbname");
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
//    $stmt = $conn->prepare("SELECT chatID FROM chat WHERE chatID ='$chatID'");
//    $stmt->execute();
//
    $stmt = $conn->prepare("INSERT INTO chat(chat_Text,
            user_names,
            e_mail,
            u_id,
            state,
            adminName) VALUES (
            :chat_text, 
            :userNames, 
            :Email, 
            :id, 
            :state,
            :adminName)");
    
    $stmt->bindParam(':chat_text', $chat_text);
    $stmt->bindParam(':userNames', $userNames);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':adminName', $adminName);
    
    $stmt->execute();
    
$newId = $conn->lastInsertId();
    
$data['last_id'] = $newId;
  
    }
catch(PDOException $e)
    {
//    echo "Connection failed: " . $e->getMessage();
    }

//    

echo json_encode($data);

?>
