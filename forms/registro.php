<?php


  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $registro = new PHP_Email_Form;
  $registro->ajax = true;
  
  $registro->to = $receiving_email_address;
  $registro->from_name = $_POST['name'];
  $registro->from_email = $_POST['email'];
  $registro->subject = "New table booking request from the website";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $registro->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $registro->add_message( $_POST['name'], 'Name');
  $registro->add_message( $_POST['email'], 'Email');
  $registro->add_message( $_POST['phone'], 'Phone', 4);
  $registro->add_message( $_POST['message'], 'Message');

  echo $registro->send();
?>
