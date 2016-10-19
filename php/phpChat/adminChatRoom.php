<?php

//$servername = "localhost";
//$username = "onlinechat";
//$password = "fB8*f3s2";
$dbname = "chat";
        try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn = new PDO("mysql:dbname=$dbname");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ////
        $selectFreeChats = $conn->prepare("SELECT * FROM  onlineChat WHERE state='open' and adminName='wait' ");
        $selectFreeChats->execute();
        $arrayFreeChats = $selectFreeChats->fetchAll();
        
        echo "<div id='chatBox'>";
    foreach($arrayFreeChats as $row){
     echo "<div class = 'separateBox col-md-4' id = 'separateBox" . $row['chatID'] . "' >
                        <div id='adminChat" . $row['chatID'] . "' class='formAdmin'>
                            <form role='form'  method='post' id='admin" . $row['chatID'] . "'  enctype='multipart/form-data'>
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
                                    <button name='chat_form' id='adminBtn" . $row['chatID'] . "'  data-role='none' class='adminGetChat'>Get Chat.</button>

                                </fieldset>
                            </form>
                        </div>
                            
                            <h3>Chat with: " . $row['user_names'] . "</h3>
    
                        <div id = 'chat" . $row['chatID'] . "' class='chatArea color'>
                        
                            <p>"  . $row['chat_Text'] . "</p>
                        </div>
                            <div id='typeMsg' >
                                <form id = '" . $row['chatID'] . "' role = 'form'  method = 'post'  enctype = 'multipart/form-data' >
                                    <input type = 'hidden' name = 'chatID' class = 'form-control' value = '" . $row['chatID'] . "' >
                        <input type='hidden' name='rainbow' class='form-control' value='Rainbow'>
                                        <p class='userId'>Message:</p>
                                    <textarea class = 'sendWithEnter' maxlength = '100' name = 'userMsg'  id='btn" . $row['chatID'] . "'>
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
