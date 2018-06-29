<?php
 session_start();
 include('db.php');
 if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id']))
 {
   $getid = (int) $_GET['id'];
   $gett = (int) $_GET['t'];
   $userId = $_SESSION['user_id'];
/*
   $check =$db->prepare('SELECT * FROM reviewtb WHERE review_id  = ? AND user_id = ?');
   $check->execute(array($getid, $userId));

   if($check->rowCount() == 1)
   {*/
      if($gett == 1)
      {
  	    $checkuserexist = $db->prepare('SELECT id FROM likes WHERE review_id = ? AND user_id =?');
        $checkuserexist->execute(array($getid, $userId));
        $userCount = $checkuserexist->rowCount();

        $deletediske =$db->prepare('DELETE FROM dislikes WHERE review_id = ? AND user_id = ? ');
        $deletediske->execute(array($getid, $userId));

        if($userCount == 1)
        {
        	$deletelike =$db->prepare('DELETE FROM likes WHERE review_id = ? AND user_id = ?');
        	$deletelike->execute(array($getid,  $userId));

            $ins = $db->prepare('INSERT INTO dislikes (review_id, user_id) VALUES (?, ?)');
            $ins->execute(array($getid,  $userId));
        }
        else
        {
        	$ins = $db->prepare('INSERT INTO likes (review_id, user_id) VALUES (?, ?)');
            $ins->execute(array($getid,  $userId));
        }
      }
      elseif($gett == 2)
      {
      	 $checkuserexists = $db->prepare('SELECT id FROM dislikes WHERE review_id = ? AND user_id = ?');
         $checkuserexists->execute(array($getid, $userId));
         $userCounts = $checkuserexists->rowCount();
         
         $deletelike =$db->prepare('DELETE FROM likes WHERE review_id = ? AND user_id = ?');
         $deletelike->execute(array($getid,  $userId));

         if($userCounts == 1)
         {
           $deletediske =$db->prepare('DELETE FROM dislikes WHERE review_id = ? AND user_id = ? ');
            $deletediske->execute(array($getid, $userId));
         }
         else
         {
            $ins = $db->prepare('INSERT INTO dislikes (review_id, user_id) VALUES (?, ?)');
           $ins->execute(array($getid,  $userId));
            
           // $ins = $db->prepare('INSERT INTO likes (review_id, user_id) VALUES (?, ?)');
	        //$ins->execute(array($getid,  $userId));
         }
         
      }
      header('Location: http://127.0.0.1:81/WorkProject/review.php?business_id='.$getid);
   
   /*else{
   	  exit('Fatal Error :<a href="http://127.0.0.1:82/WorkProject/review.php">Man Stop it</a>');
   }*/
 }
 else{
    exit('This is an error stop enjoying :<a href="http://127.0.0.1:81/WorkProject/review.php">Back to the Reviews</a>');
 }
?>