<?php
  session_start();
  include('db.php');
  if(!isset($_SESSION["username"]))
  {
  	header('location:login.php');
  }
  else
  {
  	if(isset($_POST['btnReply']))
  	 { 	    
  	    if(isset($_GET['id']) AND $_GET['id'] > 0)
  	    {
	     $getid = $_GET['id'];
	     $user_id = $_SESSION["user_id"];

         $reply_review = htmlspecialchars($_POST["myReply"]);
	     $replyQuery=$db->prepare('INSERT INTO reply (user_id, review_id, reply_review, replyDT) VALUES (?, ?, ?, Now())');
	     $replyQuery->execute(array($user_id, $getid, $reply_review));

	     unset($reply_review);
	     header('location:review.php');
  	   }
  	 }
  }
  
?>
