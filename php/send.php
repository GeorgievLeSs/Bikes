<?php
//if (!$_POST) {
//    echo 'Direct Access is not allowed !!!';
//    exit(0);
//}
//function validateDate($date, $format){
//    $d = DateTime::createFromFormat($format, $date);
//    return $d && $d->format($format) == $date;
//}
//$url = "";
//$SEND_FORM = true;
//$log_file = 'send_data.xml';
//$result_post = print_r($_POST, true);
//$redirect_time = date('Y-m-d h:i:s', time());
//$redirect_data = array();         //make empty array
//$IP = $_SERVER['REMOTE_ADDR'];     //set ip address
//$UA = $_SERVER['HTTP_USER_AGENT'];    //set User agent
//$SCRIPT_NAME = $_SERVER['SCRIPT_FILENAME'];    //
//foreach ($_POST as $key => $value) {
//    if(validateDate($value, 'Y-m-d')){
//        $value = date("d/m/Y", strtotime($value));
//        $_POST[$key] = $value;
//    }elseif (validateDate($value, 'Y-m')) {
//        $value = date("m/Y", strtotime($value));
//        $_POST[$key] = $value;
//    } else{
//        $_POST[$key] = $value;
//    } 
//}
//array_push($redirect_data, $_POST, $IP, $UA, $SCRIPT_NAME, $redirect_time); //put all in array
//$result_redirect = print_r($redirect_data, true);
//
//
//if ($SEND_FORM) {
//    file_put_contents($log_file, "<redirect date='$redirect_time'>\n$result_redirect \n</redirect>\n", FILE_APPEND);
//    $params = array(
//        'http' => array(
//            'method' => 'POST',
//            'content' => http_build_query($redirect_data)
//        )
//    );
//    if (!is_null($headers)) {
//        $params['http']['header'] = '';
//        foreach ($headers as $k => $v) {
//            $params['http']['header'] .= "$k: $v\n";
//        }
//    }
//    
//
//
//    $ctx = stream_context_create($params);
//    $fp = @fopen($url, 'rb', false, $ctx);
//    if ($fp) {
//
//        echo @stream_get_contents($fp);
//        die();
//    } else {
//        
//    }
//}