
<!DOCTYPE html>
<html lang="en-US" itemscope itemtype="http://schema.org/Service" prefix="og: http://ogp.me/ns#" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?= $cars->page_title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="description" content="<?= $cars->page_description; ?>">
        <meta name="author" content="Ivaylo Georgiev">
        <link rel="shortcut icon" type="image/ico" href="pages/images/favicon.ico">
        <meta property="og:author" content="Ivaylo Georgiev">
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="<?= $cars->page_title; ?>">
        <meta itemprop="description" content="<?= $cars->page_description; ?>">
        <meta itemprop="image" content="http://localhost/bikes/jscss/images/hotRod.jpg">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="service">
        <meta name="twitter:site" content="http://localhost/bikes">
        <meta name="twitter:title" content="<?= $cars->page_title; ?>">
        <meta name="twitter:description" content="<?= $cars->page_description; ?>">
        <meta name="twitter:creator" content="@bikes">
        <meta name="twitter:image" content="http://localhost/bikes/jscss/images/hotRod.jpg">
        <meta name="twitter:data1" content="$3">
        <meta name="twitter:label1" content="Price">
        <meta name="twitter:data2" content="Quote">
        <meta name="twitter:label2" content="Policy">

        <!-- Open Graph data -->
        <meta property="og:title" content="<?= $cars->page_title; ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="http://localhost/bikes/home" />
        <meta property="og:image" content="http://localhost/bikes/jscss/images/hotRod.jpg" />
        <meta property="og:description" content="<?= $cars->page_description; ?>" />
        <meta property="og:site_name" content="Bikes" />
        
        <link rel="stylesheet" type="text/css" href="jscss/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="jscss/css/classic.css">
        <link rel="stylesheet" type="text/css" href="jscss/css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="jscss/css/font.awesome.min.css">
        <link rel="stylesheet" type="text/css" href="jscss/css/style.css">

    </head>        
    <body>

        <?php
        include 'pages/covers/header.php';

// Set the default name
        $action = array('home', 'about', 'contacts', 'quote', 'thank_you');
// Specify some disallowed paths
        $disallowed_paths = array('header', 'footer');
        if (!empty($_GET['action'])) {
            $tmp_action = basename($_GET['action']);
            // If it's not a disallowed path, and if the file exists, update $action
            if (!in_array($tmp_action, $disallowed_paths) && file_exists("pages/{$tmp_action}.php"))
                $action = $tmp_action;
        }
        if (empty($_GET['action'])) {
            $action = 'home';
        }
// Include $action
        include("pages/$action.php");
        ?>  
        <?php
        include("pages/inline/userChat.php");
        include 'pages/covers/footer.php';
        ?>  
    <script type="text/javascript" src="jscss/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="jscss/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="jscss/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="jscss/js/validation.js"></script>
    <script type="text/javascript" src="jscss/js/picker.js"></script>
    <script type="text/javascript" src="jscss/js/jsChat/chat.js"></script>
    <script type="text/javascript" src="jscss/js/mechanic.js"></script>

    <?php
    include 'pages/inline/privacy.php';
    ?>

    </body>	

</html>

