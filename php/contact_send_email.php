<?php

foreach ($_POST as $key => $value) {
    $$key = $value;
};

include 'send_mail_class.php';


$mail2sold = new PHPMailer;
$mail2sold->From = $contact_email;
$mail2sold->FromName = $contact_name;
$mail2sold->addAddress('iivaylo_georgiev@abv.bg');
$mail2sold->Subject = '';
$mail2sold->Body = $contact_content ;

$mail2sold->send();