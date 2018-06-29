<?php
  session_start();
  if($_SESSION['username'])
  {
     header('location:login.php');
  }
  else
  {
  	include('db.php');
    include('header.php');
    
    if(isset($_GET['email'], $_get['email_code']) === true)
    {
       $email = trim($_GET['email']);
       $email_code = trim($_GET['email_code']);

       if(email_exists($email) === false){
       	$errors[] = 'Oops, somethi g went wrong, and we couldn\'t find that email!!';
       }
       else if(activate($email, $email_code) === false)
       {
          $errors[] = 'We had problems activating your accounts';
       }
    }
    else
    {
    	header('location:index.php');
    	exit();
    }
  }
?>