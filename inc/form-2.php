<!DOCTYPE html>
<html>
  <body>
    
  <?php
      // Purchase form
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $first_name = $_REQUEST["first-name"];
        $last_name = $_REQUEST["last-name"];
        $email = $_REQUEST["email"];
        $phone = $_REQUEST["phone"];
        $outside_aus = $_REQUEST["outside-aus"]? "Yes" : "No"; 
        $street = $_REQUEST["street"];
        $suburb = $_REQUEST["suburb"];
        $city = $_REQUEST["city"];
        $post_code = $_REQUEST["post-code"];
        $text = $_REQUEST["text"];
        $to_email = "shlooby07@gmail.com";
        $subject = "New Purchase Form Message";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $contactus = "
        <html>
        <p>You have a message from the Purchase Form on your website:</p>
        <b>Name: </b>".$first_name." ".$last_name."
        <br><b>Email: </b>".$email."
        <br><b>Phone: </b>".$phone."
        <br><b>Outside Australia: </b>".$outside_aus."
        <br><b>Street: </b>".$street."
        <br><b>Suburb: </b>".$suburb."
        <br><b>City: </b>".$city."
        <br><b>Post Code: </b>".$post_code."
        <br><b>Purchase details: </b>".$text."
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