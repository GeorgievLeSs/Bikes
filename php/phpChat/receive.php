<?php
header('Content-type:application/json');

    $chatIDGet = $_GET['chatID'];
    // $restoreChat = $_GET['restoreChat'];
    //     $chatIDGet = 0;
    //     $restoreChat = 0;
    // $lastFormID = $_GET['lastFormID'];

$dbname = "bikesdb";

$servername = "localhost";
$username = "LeSs";
$password = "362159847159847zsewaq";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ////

    $ldDataGet = $conn->prepare("SELECT Chat_Text FROM liveDB WHERE Chat_ID =  '$chatIDGet'");

    $ldDataGet->execute();
             $clearGet = $ldDataGet->fetchColumn();
                     $newDataGet = trim(preg_replace('/\s+/', ' ', $clearGet));

    $newSend = $conn->prepare("SELECT Sender FROM liveDB WHERE Chat_ID =  '$chatIDGet'");

    $newSend->execute();
             $clearWord = $newSend->fetchColumn();
                     $lastSend = trim(preg_replace('/\s+/', ' ', $clearWord));


                         $oldTime = $conn->prepare("SELECT Date FROM liveDB WHERE Chat_ID =  '$chatIDGet'");

                         $oldTime->execute();
                                  $checkTime = $oldTime->fetchColumn();

                            //  $catchAllOpenState = $conn->prepare("SELECT * FROM  liveDB WHERE State = 'open'");
                            //  $catchAllOpenState->execute();
                            //  $checkEachOne = $catchAllOpenState->fetchAll();
                             //
                            //  foreach($checkEachOne as $row){

                                //  $checkUserTime = ['Date'];

                                 $eachTimeStamp = strtotime($checkTime);
                                 $setCloseForOld = strtotime("-3 minutes");

                                 if ($eachTimeStamp <= $setCloseForOld) {

                                     $closeChatByTime = $conn->prepare("UPDATE liveDB SET State = 'close' WHERE State = 'open' AND Date = '$checkTime'");
                                     $closeChatByTime->execute();
                                 }
                            //  }

                                $checkState = $conn->prepare("SELECT State FROM liveDB WHERE Chat_ID =  '$chatIDGet'");
                            
                                $checkState->execute();
                                         $clearState = $checkState->fetchColumn();
                                                 $lastState = trim(preg_replace('/\s+/', ' ', $clearState));

$data['newMsgGet'] = $newDataGet;

$data['lastState'] = $lastState;

$data['adminSend'] = $lastSend;
    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    }

        echo json_encode($data);

?>
