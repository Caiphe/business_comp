<?php
 session_start();
 include('db.php');
  
  if(isset($_POST['submit']))
  {
  	$header ="// From Durban Directory";
	$from = htmlspecialchars($_POST["emailAddress"]);
	$subject = "Message From Durban Directory Website";
  	$frstName = htmlspecialchars($_POST["fstname"]);
  	$lstName = htmlspecialchars($_POST["scndname"]);
  	$contactNumber = htmlspecialchars($_POST["contactNumber"]);
  	$emailAddress = htmlspecialchars($_POST["emailAddress"]);
  	$message = htmlspecialchars($_POST["message"]);
    
    if(empty($frstName) || empty($lstName) || empty($contactNumber) || empty($emailAddress) || empty($message))
    {
    	$errorMsg = '
           <script type="text/javascript">
              swal({
	          button: {
	            text: "Close",
	            button: true,
	          },
	          title: "All fields are required !!!",
	          icon: "error",
	          closeOnClickOutside: false,
	          closeOnEsc: false,
            });
           </script>
    	';
    }
     if(!empty($emailAddress) && !filter_var($emailAddress, FILTER_VALIDATE_EMAIL))
    {
    	$errorMsg ='
         <script type="text/javascript">
	           swal({
	          button: {
	            text: "Close",
	            button: true,
	          },
	          title: "A valid Email Required !!",
	          icon: "error",
	          closeOnClickOutside: false,
	          closeOnEsc: false,
            });
           </script>
    	';
    }
    if($errorMsg == "")
    {
      $validationOK = true;
	  if ( !$validationOK )
     {
	  print "<meta http-equiv=\"refresh\" content=\"0;URL=conterror.php\">";
	  exit;
	 }
    	$body ="\n";
    	$body .="Name :";
    	$body .=$frstName;
    	$body .="\n";
    	$body .="Last Name :";
    	$body .= $lstName;
    	$body .= "\n";
    	$body .="Contact Number :";
    	$body .=$contactNumber;
    	$body .="\n";
    	$body .="Message :";
    	$body .=$message;

	 // send email 
	$success = mail( $from, $subject, $Body, "From: Mr/Mme <$frstName>" );

	// redirect to success page 
	if ( $success ) 
	{
	  print "<meta http-equiv=\"refresh\" content=\"0;URL=contthanks.php\">";
	} 
	else 
	{
	  print "<meta http-equiv=\"refresh\" content=\"0;URL=conterror.php\">";
	}
	   unset($frstName);
	   unset($lstName);
	   unset($contactNumber);
	   unset($emailAddress);
	   unset($message);
    }
  }
 include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link href="https://fonts.googleapis.com/css?family=Khand|Rajdhani|Shrikhand|Sintony" rel="stylesheet">
	<style type="text/css">
	   body
	   {
	   	  font-family: 'Sintony', sans-serif;
	   }
		#mainDiv
		{
			background-color: #ececec;
			margin-top: -20px;
		}
		#ContactForm input
		{
            border:solid 1px #636366;
            border-radius: 0px;
		}
		#message
		{
			border:solid 1px #636366;
			border-radius: 0px;
		}
		#submit
		{
			padding: 7px;
			background-color: #130a42;
			color: white;
			font-size: 15px;
			border-radius: 0px;
			border:solid 1px white;
		}
		#submit:hover
		{
			background-color: transparent;
			cursor: pointer;
			color: #130a42;
			border:solid 1px #130a42;
		}
		#contactText
		{
			font-size: 20px;
			font-weight: bold;
			color: #130a42;
		}
		#
		{
			width: 220px;
		    background-color: #3f7cdd;
		    color: #fff;
		    text-align: left;
		    border-radius: 6px;
		    padding: 10px;
		    font-size: 12px;
		    line-height: 1px;
		    margin-left: 2px;
		    margin-top: -4px;
		    /* Position the tooltip */
		    position: absolute;
		    z-index: 0;
		    /*animation */
            -webkit-animation-duration: 2s;
            -webkit-animation-iteration-count: 1;
            -moz-animation-duration: 2s;
            -moz-animation-iteration-count: 1;
            -o-animation-duration: 2s;
            -o-animation-iteration-count: 1;
		}
		/*#errorMsg::after
		{
			content: " ";
		    position: absolute;
		    top: 50%;
		    right: 100%; /* To the left of the tooltip 
		    margin-top: -5px;
		    border-width: 5px;
		    border-style: solid;
		    border-color: transparent #3f7cdd transparent transparent;
		}*/
		.swal-button {
                padding: 7px 19px;
                color: #34A853;
                border-radius: 5px;
                background-color: transparent;
                font-size: 13px;
                border: 1px solid #34A853;
            }
            .swal-title {
                font-family: 'Raleway',Arial,Helvetica,sans-serif;
                font-weight: 300;
                font-size: 25px;
            }
		#errorMsg
		{
			background-color: #b71b1b;
			color: white;
			font-size: 13px;
			padding: 10px;
			text-align: center;
			border-bottom-right-radius: 15px;
			border-top-left-radius: 15px;
		}
	</style>
</head>
<body>
	<div class="container-fluid" id="mainDiv">
		<div class="container" style="background-color: white;">
	 <br>
             <p style="font-size: 30px;padding: 0px 30px;">Get in touch</p>
			<br>
		</div>
		<br>
		<div class="container" style="background-color: white;">
			<div class="col-md-6">
				<div style="padding: 30px;" id="ContactForm">
				<form method="post">
					<?php
                       if(isset($errorMsg))
                       {
                       	?>
	                       	<!--<p id="errorMsg" class="animated flipInY"> <i class="icon ion-alert-circled"></i></p>-->
							<?php echo $errorMsg; ?>
                       	<?php
                       }
					?>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="fstname">First Name</label>
						        <input type="text" name="fstname" id="fstname" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="scndname">Second Name</label>
						        <input type="text" name="scndname" id="scndname" class="form-control" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="contactNumber">Contact Number</label>
						        <input type="number" name="contactNumber" id="contactNumber" class="form-control" >
							</div>
							<div class="col-md-6">
								<label for="emailAddress">Email</label>
						        <input type="email" name="emailAddress" id="emailAddress" class="form-control" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="message">Messsage</label>
						<textarea class="form-control" cols="3" rows="5" id="message" name="message" ></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-default btn-block" type="submit" name="submit" id="submit"><i class="icon ion-paper-airplane"></i> SEND </button>
					</div>
					<p style="text-align: center;color: #acacaf;font-size: 12px;"> Send us a mail and we will get back to you soon and very soon!!!</p>
				</form>
				</div>
			</div>
			<div class="col-md-6">
				<br>
				<div style="padding: 30px;">
				<p id="contactText">Contact Us</p>
				<table>
					<tr>
						<td>Cell Number &nbsp;</td>
						<td>: 084 000 0000</td>
					</tr>
					<tr>
						<td>Tel Number &nbsp;</td>
						<td>: 084 000 0000</td>
					</tr>
					<tr>
						<td>Email Address &nbsp;</td>
						<td>: <a href="#">info@durband.co.za</a></td>
					</tr>
				</table>
				<br><br>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1702518.8558829988!2d23.05284712083724!3d-30.92387895286842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1c34a689d9ee1251%3A0xe85d630c1fa4e8a0!2sSouth+Africa!5e0!3m2!1sen!2sza!4v1519135609677" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			</div>
		</div>
		<br><br>
	</div>
</body>
<?php include('scroll.php') ?>
<?php include('footer.php') ?>
</html>
   <script type="text/javascript" src="swal/sweetalert2.min.js"></script>
