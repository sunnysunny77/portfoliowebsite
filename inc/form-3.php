<!DOCTYPE html>
<html>
  <body>
    
  <?php
      // Enquiry form
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $first_name = $_REQUEST["first-name"];
        $last_name = $_REQUEST["last-name"];
        $email = $_REQUEST["email"];
        $phone = $_REQUEST["phone"];
        $text = $_REQUEST["text"];
        $to_email = "shlooby07@gmail.com";
        $subject = "New Enquiry Form Message";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $contactus = "
        <html>
        <p>You have a message from the Enquiry Form on your website:</p>
        <b>Name: </b>".$first_name." ".$last_name."
        <br><b>Email: </b>".$email."
        <br><b>Phone: </b>".$phone."
        <br><b>Enquiry: </b>".$text."
        </html>";
      

        $mail = mail($to_email,$subject,$contactus,$headers);
        if (!$mail) {
          $res = print_r(error_get_last()['message']);
        } else {
          $res = "Thanks, sent to &#128231;";
        }
        
      }

  ?>

  <?php echo $res; ?>  

  </body>
</html>