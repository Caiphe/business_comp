<?php 
session_start();
if(!isset($_SESSION['username']))
{
	header('location:login.php');
}
include('db.php');
include('header.php');

$username = $_SESSION['username'];
$sqldetail =$db->prepare("SELECT * FROM signup WHERE username = ? ");
$sqldetail->execute(array($username));
 
  while($result=$sqldetail->fetch())
  {
  	$name = $result['name'];
  	$lastname = $result['lastname'];
  	$email = $result['email'];
  	$mobile = $result['mobile'];
  }

  if(isset($_POST['submit']))
   {
   	 $name = htmlspecialchars($_POST['name']);
   	 $lastname = htmlspecialchars($_POST["lastname"]);
   	 $email = htmlspecialchars($_POST["email"]);
   	 $contact = htmlspecialchars($_POST["contact"]);
     $newpass = htmlspecialchars($_POST["newpass"]);
     $newpassconfirm = htmlspecialchars($_POST["newpassconfirm"]);
     $newpass = md5($newpass);
     $newpassconfirm = md5($newpassconfirm);

     
     if(empty($_POST['newpass']) && empty($_POST['$newpassconfirm']))
     {
     	$sqlupdat = $db->prepare('UPDATE signup SET name =?, lastname = ?,  email=?, mobile = ? WHERE username = ?');
     	$sqlupdat->execute(array($name, $lastname, $email, $contact, $_SESSION['username']));
     	$successmsg = 'You have updated your profile';
     }
     if(!empty($_POST["newpass"]) && !empty($_POST["newpassconfirm"]))
     {
     	if($newpass != $newpassconfirm)
     	{
     		$errormsg = "Passwords do not match ";
     		unset($newpass);
     		unset($newpassconfirm);
     	}
     	else
     	{
     		$sqlupdat = $db->prepare('UPDATE signup SET name =?, lastname = ?,  email=?, mobile = ?, password = ? WHERE username = ?');
     		$sqlupdat->execute(array($name, $lastname, $email, $contact, $newpass, $_SESSION['username']));
     		$successmsg = 'You successfully updated your profile';
     	}
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit_Profile</title>
</head>
<style type="text/css">
	body
	{
		 font-family: 'Sintony', sans-serif;
	}
	#formDiv
	{
		width: 45%;
		margin: 30px auto;
		min-width: 300px;
		background-color: #ececec;
		padding: 30px;
		border-radius: 15px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	}
	#formDiv input
	{
    border:solid 1px #585857;
	}
	#submit
	{
		background-color: #090f32;
		color: white;
		font-size: 18px;
		text-align: center;
	}
	#submit:hover
	{
		border:solid 1px #090f32;
		color: #090f32;
		font-size: 18px;
		animation-duration: 1s ;
    animation-name: btntrans;
   -webkit-animation-duration : 1s ;
   -webkit-animation-name : btntrans;
   -moz-animation-name: 1s ;
   -moz-animation-duration : btntrans;
	}
	@-webkit-keyframes btntrans 
    {
        from {background-color: #090f32; color: #ffffff;}
        to {background-color: #ffffff; color: #090f32;}
    }

    @-moz-keyframes btntrans 
    {
        from {background-color: #090f32; color: #ffffff;}
        to {background-color: #ffffff; color: #090f32;}
    }
    @keyframes btntrans 
    {
        from {background-color: #090f32; color: #ffffff;}
        to {background-color: #ffffff; color: #090f32;}
    }
   #successMsg
  {
    text-align: center;
    color: white;
    background-color: #38a536;
    padding: 5px 20px;
    -webkit-animation-duration : 2s;
    -webkit-animation-iteration-count:1;
    -moz-animation-iteration-count:1;
    -moz-animation-duration : 2s;
    border-bottom-right-radius: 15px;
    border-top-left-radius: 15px;
   }
</style>
<body>
 <div class="container">
 	<div id="formDiv">
 		<div>
 			<p style="text-align: center;font-size:25px;color: #090f32;">EDIT PROFILE</p>
 			<form method="POST" >
 				<?php if(isset($successmsg))
 				{
          ?>
          <p id="successMsg" class="animated flipInY"><i class="icon ion-android-done-all"></i> <?php echo $successmsg; ?></p>
          <?php
 				}
 				?>
 				<?php
 				  if(isset($errormsg))
 				  {
 				  	?>
 				  	<p style="text-align: red;color: red;"><?php echo  $errormsg ?></p>
 				  	<?php
 				  }
 				?>
 				<div class="form-group">
 					<label for="name">Name</label>
 					<input type="text" name="name" id="name" class="form-control" required value="<?php echo $name; ?>" />
 				</div>
 				<div class="form-group">
 					<label for="lastname">Surname</label>
 					<input type="text" name="lastname" id="lastname" class="form-control" required value="<?= $lastname; ?>" >
 				</div>
 				<div class="form-group">
 					<label for="email">Email</label>
 					<input type="email" name="email" id="email" class="form-control" required value="<?= $email; ?>">
 				</div>
 				<div class="form-group">
 					<label form="mobile">Phone Number</label>
 					<input type="number" name="contact" id="contact" class="form-control" required value="<?= $mobile; ?>">
 				</div>
 				<label style="color: #ac2828;font-size: 15px;">Leave Blank if You don't wish to change your password !!</label>
 				<div class="form-group">
 					<label form="newpass">New Password</label>
 					<input type="password" name="newpass" id="newpass" class="form-control">
 				</div>
 				<div class="form-group">
 					<label form="newpassconfirm">Confirm New Password</label>
 					<input type="password" name="newpassconfirm" id="newpassconfirm" class="form-control">
 				</div>
 				<div class="form-group">
 					<button class="btn btn-default btn-block" type="submit" id="submit" name="submit"><i class="icon ion-edit"></i> Update</button>
 				</div>
 			</form>
 		</div>
 	</div>
 </div>
</body>
<?php include('footer.php') ?>
</html>
