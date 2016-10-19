
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>
            Administrator Room
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="description" content="First Form">
        <meta name="theme-color" content="#999999" />
        <link rel="stylesheet" type="text/css" href="jscss/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="jscss/css/style.css">
    </head>
    <body>

        <?php include 'pages/layouts/header.php'; ?>
            <section id="admin">
                <div class="container">
                    <h3>Administrator Page</h3>
                    
                        <?php include 'php/phpChat/adminChatRoom.php'; ?>
                    
                </div>
            </section>  
        <?php include 'pages/layouts/footer.php'; ?>  
        
        <script type="text/javascript" src="jscss/js/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="jscss/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="jscss/js/validation.js"></script>
        <script type="text/javascript" src="jscss/js/jsChat/distributeChat.js"></script>
    </body>
</html>
           