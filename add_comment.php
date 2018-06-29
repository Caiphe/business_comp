<?php
 session_start();
 include('db.php');
 include('header.php');;

if(!isset($_SESSION["username"]))
{
	header('location:login.php');
}
else
{
 if(isset($_POST["submit"]))
 {
 	$review = htmlspecialchars($_POST["review"]);

 	if(empty($review))
 	{
 		$errorMsg = "Revire required";
 	}
 	else
 	{
 		$queryUserID = $db->prepare("SELECT user_id FROM signup WHERE username = ?");
 		$queryUserID->execute(array($_SESSION['username']));
 		$queryBusinessId = $db->prepare("SELECT business_id FROM business WHERE company_name = ?");
 		$queryBusinessId->execute(array($_SESSION["business"]));

 		while ($resultid = $queryUserID->fetch()) 
 		{
 			$userid = $resultid['user_id'];
 		}
 		while ( $resultBusinessId = $queryBusinessId->fetch()) 
 		{
 			$businessId = $resultBusinessId['business_id'];
 		}

 		$queryReview = $db->prepare('INSERT INTO reviewtb (user_id, business_id, review,reviewDT) VALUES(?, ?, ?, Now())');
 		$queryReview->execute(array($userid, $businessId, $review));
 		$success = "You review is posted successfully";
 	}
  }
}
?>

