<?php

$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];

    $adminNames = $FirstName . "_" . $LastName;

$_SESSION["adminNamesNew"] = $adminNames;
$adminIDSession = $_SESSION["adminNamesNew"] ;

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

        $createAdminPage = $conn->prepare("SELECT * FROM  liveDB WHERE State='open' and Admin_ID='$adminIDSession' ");
        $createAdminPage->execute();
        $allElementsDB = $createAdminPage->fetchAll();

        echo "<div id='chatBox'>";

        foreach($allElementsDB as $row){
         echo "<div class = 'separateBox col-md-4' id = 'separateBox" . $row['Admin_ID'] . "' >

                                <h3>Chat with: " . $row['User_Names'] . "</h3>

                            <div id = 'chat" . $row['Chat_ID'] . "' class='chatArea color'>

                                <p>"  . $row['Chat_Text'] . "</p>
                            </div>
                                <div id='typeMsg' >
                                    <form id = '" . $row['Chat_ID'] . "' role = 'form'  method = 'post'  enctype = 'multipart/form-data' >
                                        <input type = 'hidden' name = 'Admin_ID' class = 'form-control' value = '" . $row['Admin_ID'] . "' >
                            <input type='hidden' name='rainbow' class='form-control' value='Rainbow'>
                                            <p class='userId'>Message:</p>
                                        <textarea class = 'sendWithEnter form-control col-md-10' maxlength = '100' name = 'userMsg'  id='btn" . $row['Chat_ID'] . "' row='30'>
                                        </textarea>
                                    </form>
                                </div>
                        </div>";
        }

        echo "</div>";
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

?>
