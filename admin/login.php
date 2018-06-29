<?php
session_start();


	if(isset($_POST['btnSubmit']))
   {
	 $password = 'Marchall004';
	 $adminPass = trim(htmlspecialchars($_POST["adminPass"]));

	 if($adminPass == $password)
	 {
	 	header('location:admin.php');
	 }
	 else
	 {
	 	$errorMsg ="Wrong Password";
	 }
  
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="css/animate.css" rel="stylesheet"> 
  <style type="text/css">
    #mainDiv
    {
      background-image: url(img/myBack.jpg);
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-position: fixed;
      min-width: 400px;
    }
  	#divForm
  	{
  		margin: 8% auto;
  		width: 40%;
  		min-width: 300px;
  		background-color: white;
  		border-radius: 10px;
  	}
  	#wrongPass 
  	{
  		color: #ad1624; 
  		text-align: center;
  		margin-top: -10px;
      -webkit-animation-iteration-count:2;
      -webkit-animation-duration:2s;
      -moz-animation-iteration-count:2;
      -moz-animation-duration:2s;
      -o-animation-duration:2s;
      -o-animation-iteration-count:2;
  	}
    #passError 
    {
      color: #ad1624; 
      text-align: center;
      margin-top: -10px;
      -webkit-animation-iteration-count:2;
      -webkit-animation-duration:2s;
      -moz-animation-iteration-count:2;
      -moz-animation-duration:2s;
      -o-animation-duration:2s;
      -o-animation-iteration-count:2;
    }
  	#headr
  	{
  		background-color: #004e97;
  		height: 60px;
  		border-top-left-radius: 10px;
  		border-top-right-radius: 10px;
  		text-align: center;
  		
  	}
  	#footer
  	{
  		background-color: #004e97;
  		height: 40px;
  		color: white;
  		border-bottom-left-radius: 10px;
  		border-bottom-right-radius: 10px;
  	}
  	#adminHeading
  	{
  		text-align: center;
  		color: #dbdbdb;
  	}
  	#btnSubmit
  	{
  		background-color: #004f99;
  		color: white;
  		font-size: 15px;
      width: 80%;
      border-radius: 10px;

  	}
    #adminPass
    {
      border-radius: 10px;
      border:solid 1px #6d6d6d;
      width: 80%;
    }
  </style>
</head>
<body id="mainDiv">
  <div class="container-fluid" >
	<div class="container">
		<div id="divForm">
			<div id="headr">
				<br>
				<p id="adminHeading">ADMIN </p>
				<br><br>
			</div>
			<br>
			<p style="text-align: center;">
				<img src="img/user.png">
			</p>
      <br>
			<?php if(isset($errorMsg)){
			?>
			    <p class="animate flash" id="wrongPass" > <i class="fa fa-warning"></i> <?php echo $errorMsg; ?></p>
            <?php
			 }
			?>
			<form method="POST" name="myForm" onsubmit="return validation()">
				<div class="form-group">
					<div class="input-form" align="center">
						<input type="password" class="form-control" name="adminPass" id="adminPass" placeholder="Admin Password">
					</div>
				</div>
				<p id="passError" class="animate flash"></p>
				<div class="form-group" align="center">
					<br>
					<button class="btn btn-default btn-block" type="submit" name="btnSubmit" id="btnSubmit"> <i class="fa fa-lock"></i> Login</button>
				</div>
			</form>
      <br><br>
			<div id="footer">
			</div>

		</div>
	</div>
  <br>
</div>
</body>
</html>
<script type="text/javascript">
	var adminPass = document.forms['myForm']['adminPass'];
    var passError = document.getElementById('passError');
    adminPass.addEventListener("blur", passwordVerify, true);

     function validation()
     {
     	if(adminPass.value == "")
     	{
     		adminPass.style.border = "1px solid #ad1624"; 
     		passError.textContent = "You have to have an admin password";
     		adminPass.focus();
     		return false;
     	}
     }
     function passwordVerify()
     {
        if(adminPass.value != "")
        {
        	adminPass.style.border = "solid 1px #29611a";
        	passError.innerHTML = "";
        	return true; 
        }
     }

</script>