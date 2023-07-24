<?php
  $name = htmlspecialchars($_POST['name']);
  $cname = htmlspecialchars($_POST['cname']);
  $location = htmlspecialchars($_POST['location']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);

  if(!empty($email) && !empty($phone) && !empty($location) && !empty($name) && !empty($cname)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "pratikdesai4841@gmail.com"; //enter that email address where you want to receive all messages
      $subject = "From: $name <$email>";
      $body = "Name: $name\nPhone: $phone\nEmail: $email\nCompany Name: $cname\nLocation: $location\n\nRegard,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
        header("Location: thankyou.html");
      }else{
        echo "Sorry, failed to send your message!";
      }
    }else{
      echo "Enter a valid email address!";
    }
  }else{
    echo "All field is required!";
  }
?>
