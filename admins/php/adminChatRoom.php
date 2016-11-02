<?php

//$servername = "localhost";
//$username = "onlinechat";
//$password = "fB8*f3s2";
$dbname = "bikesdb";
$servername = "localhost";
//$servername = "127.0.0.1";
$username = "LeSs";
$password = "362159847159847zsewaq";
        try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // $conn = new PDO("mysql:dbname=$dbname");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ////
        $selectFreeChats = $conn->prepare("SELECT * FROM  liveDB WHERE State='open' and Admin_ID='wait' ");
        $selectFreeChats->execute();
        $arrayFreeChats = $selectFreeChats->fetchAll();

        echo "<div id='chatBox'>";
    foreach($arrayFreeChats as $row){
     echo "<div class = 'separateBox col-md-4' id = 'separateBox" . $row['Chat_ID'] . "' >
                        <div id='adminChat" . $row['Chat_ID'] . "' class='formAdmin'>
                            <form role='form'  method='post' id='admin" . $row['Chat_ID'] . "'  enctype='multipart/form-data'>
                                <fieldset>

                                    <div class='form-group'>
                                        <label>
                                            First Name
                                        </label>
                                        <input type='text' name='FirstName' class='form-control'>
                                    </div>
                                    <div class='form-group'>
                                        <label>
                                            Last Name
                                        </label>
                                        <input type='text' name='LastName' class='form-control'>
                                    </div>
                                    <button name='chat_form' id='adminBtn" . $row['Chat_ID'] . "'  data-role='none' class='styleButton adminGetChat'>Get Chat.</button>

                                </fieldset>
                            </form>
                        </div>

                            <h3>Chat with: " . $row['User_Names'] . "</h3>

                        <div id = 'chat" . $row['Chat_ID'] . "' class='chatArea color'>

                            <p>"  . $row['Chat_Text'] . "</p>
                        </div>
                            <div id='typeMsg' >
                                <form id = '" . $row['Chat_ID'] . "' role = 'form'  method = 'post'  enctype = 'multipart/form-data' >
                                    <input type = 'hidden' name = 'chatID' class = 'form-control' value = '" . $row['Admin_ID'] . "' >
                        <input type='hidden' name='rainbow' class='form-control' value='Rainbow'>
                                        <p class='userId'>Message:</p>
                                    <textarea class = 'sendWithEnter' maxlength = '100' name = 'userMsg'  id='btn" . $row['Admin_ID'] . "'>
                                    </textarea>
                                </form>
                            </div>
                    </div>";
    }
        echo "</div>";
        }
        catch(PDOException $e) {
//             echo "Error: " . $e->getMessage();
        }


?>
