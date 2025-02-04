<?php

require_once('../autoloader.php');
use Helper\ForgotPassword as FP;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
 if(isset($_POST["email"]) && isset($_POST["submit"])
 {
  $email = $_POST["email"];
  
  // Lets check email if it exists
  $email_exists = FP::email_check($email);
  if($email_exists == true)
  {
   // Update password
   $update = FP::update_password($email);
  if($updat == true)
  {
   // Send user an email
   $send = FP::send_email($email);
   if($send == true)
   {
    $data = [
       'res' => 'New Password Sent Successfully To Your Email.',
       'status' => 200,
       'data' => $email
     ];
   }
    else
   {
    $data = [
      'res' => 'Unable To Send New Password To Your Email.',
      'status' => 404
       ];
  }
 }
}
}
}

// Output json
echo json_encode($data);

?>
