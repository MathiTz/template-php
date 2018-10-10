<?php
require_once("vendor/autoload.php");

use Rain\Tpl;

// config
$config = array(
    "tpl_dir"       => "tpl/",
    "cache_dir"     => "cache/",
//    "debug"         => true, // set to false to improve the speed
);

Tpl::configure( $config );


// Add PathReplace plugin (necessary to load the CSS with path replace)
//Tpl::registerPlugin( new Tpl\Plugin\PathReplace() );


// create the Tpl object
$tpl = new Tpl;

// assign a variable
$tpl->assign( "name", "Hcode" );
$tpl->assign( "version", PHP_VERSION );

// assign an array
//$tpl->assign( "week", array( "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ) );

// draw the template
$tpl->draw( "index", true);

  require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
  require("vendor/phpmailer/phpmailer/src/SMTP.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "cursophp7hcode@gmail.com";
    $mail->Password = "<?senha?>";
    $mail->SetFrom("cursophp7hcode@gmail.com");
    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->AddAddress("matheusalves789@gmail.com");

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }
?>

