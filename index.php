<?php
require_once 'autoload.php';
//require 'phpmailer/phpmailer/src/PHPMailer.php';
use PHPMailer\PHPMailer\PHPMailer;
$post_date = file_get_contents("php://input");
$received = json_decode($post_date);
error_reporting(E_ERROR | E_PARSE);
function sender($l_code,$received_values = ''){
    switch($l_code){

        case 0:
        //Mail couldn't be sent.
            echo '{"code":0}';
            //echo $received->email;
            break;

        case 1:
            echo '{"code":1}';
            break;

        case 200:
            echo '{"code":200}';
            break;

        case 3:
    }
}

$m = new PHPMailer;
$m->isSMTP();
$m->SMTPAuth = true;
$m->SMTPDebug = 2;
$m->Host = 'smtp.gmail.com';
        
$m->Username = 'shubhamsengar88@gmail.com';
$m->Password = 'Your password';
$m->SMTPSecure = 'ssl';
$m->Port = 465;

$m->From = 'shubhamsengar88@gmail.com';
$m->FromName = 'from name';
$m->addReplyTo('shubhamsengar88@gmail.com','Reply address');
$received->email = 'shubhamsengar88@gmail.com';
$m->addAddress($received->email);
$m->Subject = 'Mail Test';
$letter = '{"operation":'.'"'.$received->operation.'",'.
            '"email":'.'"'.$received->email.'"'
            .'}';
//echo $letter;
$om =  openssl_encrypt ( $letter ,'BF-CBC', 'mykey');
//echo $om;
$url = "http://localhost/index.php#!/url/".$om;
//echo $url;
$m->Body = 'Hi, Someone Welcomes you. <a href="'.$url.'">Please click here</a> for some operation.';
$m->AltBody = 'This is alt body';
//echo $m->Body;
    
    
    if($m->send() == true){
        echo'ss_just_for_breaking_pt';
    sender(200);
    }else{
        sender(0);
    }
//D:\xampp\htdocs\1\sdf\PHPMailer\vendor\index.php
?>
