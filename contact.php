<?php
   // Checking For Blank Fields..
    if($_POST["name"]==""||$_POST["email"]==""||$_POST["phone"]==""||$_POST["company"]==""){
        header("Location:contact-us.html?id=error");  
        exit();
    }
    else{
        //get all values 
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['phone'];
        $company=$_POST['company'];
        $message=$_POST['message'];
        // Check if the "Sender's Email" input field is filled out
        $emailval = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
        if(!preg_match($emailval, $email)){
            header("Location:contact-us.html?id=error");  
            exit();
        }
        // Check if the "Sender's Mobile" input field is filled out
        $mob="/^[1-9][0-9]*$/"; 
        if(!preg_match($mob, $mobile)){
            header("Location:contact-us.html?id=mobileEror");  
            exit();
        }
        //Email to user
        $to = $_POST['email'];
        $subject = 'Enquiry Confirmation' . "\r\n\r\n";
        $message .= 'Dear' . $_POST['name'] . "\r\n\r\n";
        $message .='message:' . $_POST['message'] . "\r\n\r\n";
        $message .='Thank you for getting in touch!. We appreciate you contacting us. One of our customer happiness members will be getting back to you shortly. Thanks in advance for your patience. Have a great day!' . "\r\n\r\n";
        $from = "care@growbizlogistics.com";
        $headers = "From:" . $from;
        mail($to,$subject,$message,$headers);
        //Email to admin
        $to1="growbizlogistics@gmail.com";
        $subject1 = 'Enquiry Confirmation from Website';
        $message1 .='A user want to contact with us. Kindly contact him asap.';
        $message1 .="\r\n\r\n";
        $message1 .= 'name:' . $_POST['name'] . "\r\n\r\n";
        $message1 .= 'Email:' . $_POST['email'] . "\r\n\r\n";
        $message1 .= 'Phone:' . $_POST['phone'] . "\r\n\r\n";
        $message1 .= 'company:' . $_POST['company'] . "\r\n\r\n";
        $message1 .= 'message:' . $_POST['message'] . "\r\n\r\n";
        $headers1 = "From: care@growbizlogistics.com" . "\r\n" .
       "CC: growbizlogistics@gmail.com";
        mail($to1,$subject1,$message1,$headers1);
        header("Location:thank-you.html");
    }
  ?> 