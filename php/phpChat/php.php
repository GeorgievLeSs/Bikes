<?php
header('Content-type:application/json');

//
$SEND_FORM = true;
$log_file = 'chat_form_data.xml';
$redirect_data = array();
$result_post = print_r($_POST, true);

array_push($redirect_data, $_POST);
$result_redirect = print_r($redirect_data, true);
    file_put_contents($log_file, "<redirect>\n$result_redirect \n</redirect>\n", FILE_APPEND);

$servername = "localhost";
$username = "LeSs";
$password = "362159847159847zsewaq";
$dbname = "bikesdb";

    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $State = 'open';
    $adminName = 'wait';
    $userIP = $_POST['userIP'];
    // $userIP = 'monkey';

    $userNames = $FirstName . ' ' . $LastName;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    $conn = new PDO("mysql:host=$servername; dbname=$dbname");

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//
    $stmt = $conn->prepare("INSERT INTO liveDB(Chat_Text,
            User_Names,
            E_Mail,
            User_ID,
            State,
            Admin_ID) VALUES (
            :chat_text,
            :userNames,
            :Email,
            :userIP,
            :State,
            :adminName)");

    $stmt->bindParam(':chat_text', $chat_text);
    $stmt->bindParam(':userNames', $userNames);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':userIP', $userIP);
    $stmt->bindParam(':State', $State);
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
