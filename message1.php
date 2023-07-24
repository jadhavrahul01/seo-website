<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['number']);
  $location = htmlspecialchars($_POST['location']);
  $message = htmlspecialchars($_POST['message']);

  if(!empty($email) && !empty($phone) && !empty($location) && !empty($name) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "pratikdesai4841@gmail.com"; //enter that email address where you want to receive all messages
      $subject = "From: $name <$email>";
      $body = "Name: $name\nPhone: $phone\nEmail: $email\nLocation: $location\nMessage: $message\n\nRegard,\n$name";
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