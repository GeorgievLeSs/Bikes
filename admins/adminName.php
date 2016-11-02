
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>
            Administrator Page
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="description" content="Admin Chat">
        <meta name="theme-color" content="#999999" />
        <link rel="stylesheet" type="text/css" href="jscss/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="jscss/css/style.css">
    </head>

    <body>

        <?php include '../pages/covers/header.php'; ?>

            <section id="admin">
                <div class="container">
                    <h3>Administrator Name</h3>

                        <div  class="formAdmin">
                            <form role="form"  method="post" id="adminLogin" enctype='multipart/form-data'>
                                <fieldset>

                                    <div class='form-group'>
                                        <label>
                                            First Name
                                        </label>
                                        <input type="text" name="FirstName" class="form-control">
                                    </div>
                                    <div class='form-group'>
                                        <label>
                                            Last Name
                                        </label>
                                        <input type="text" name="LastName" class="form-control">
                                    </div>
                                    <button name="chat_form" id="adminBtn" data-role="none" class="styleButton">Get Chat.</button>

                                </fieldset>
                            </form>
                        </div>

                        <?php include 'php/adminName.php'; ?>
            </section>

        <?php include '../pages/covers/footer.php'; ?>
        <script type="text/javascript" src="../jscss/js/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="../jscss/js/bootstrap.min.js"></script>
        <!-- <script type="text/javascript" src="jscss/js/validation.js"></script> -->
        <script type="text/javascript" src="jscss/js/admin.js"></script>
    </body>
</html>
