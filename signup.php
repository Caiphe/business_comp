<?php 
  session_start();
  include('db.php');
  include('header.php');

  if(isset($_SESSION['username']))
  {
    header('location:index.php');
  }
  else
  {
   $error = false;
   if(isset($_POST["submit"]))
   {
    $name = htmlspecialchars(stripcslashes($_POST["name"]));
    $lastname = htmlspecialchars(stripcslashes($_POST["lastname"]));
    $email =  htmlspecialchars(stripcslashes($_POST["email"]));
    $mobileNumber = htmlspecialchars(stripcslashes($_POST["mobileNumber"]));
    $username = htmlspecialchars(stripcslashes($_POST["username"]));
    $password = htmlspecialchars(stripcslashes($_POST["password"]));
    $password= md5($password);

    $email_code = md5($username).microtime();

    if(empty($name) || empty($lastname) || empty($email) || empty($mobileNumber) || empty($username) || empty($password) )
    {
      $error = true;
      $errorMsg = "All fields are required";
    }
    else
    {
    if($username == $password)
    {
      $error = "true";
      $errorMsg = "username & password don\n't have to be same";
    }
     $sqlemail = $db->query("SELECT * FROM signup WHERE email ='".$email."'");
     $sqlcontact = $db->query('SELECT * FROM signup WHERE mobile ="'.$mobileNumber.'" ');
     $sqlusername = $db->query('SELECT * FROM signup WHERE username = "'.$username.'"');
     $sqlFocus = $db->query('SELECT max(focusCode) as focusCodeMax FROM signup');
     $focusResult = $sqlFocus->fetch();
     $focusLastResult = $focusResult['focusCodeMax'] + 1;

    if($sqlemail->rowCount() > 0)
    {
      $error = true;
      $errorMsg ='Email Exist already';
    }
    if($sqlcontact->rowCount() > 0)
    {
      $error = true;
      $errorMsg ='Contact Exist already';
    }
    if($sqlusername->rowCount() > 0)
    {
      $error = true;
      $errorMsg ='username Exist already';
    }
    if(!$error)
    {
      $sql = $db->prepare("INSERT INTO signup(name, lastname, email, mobile, username, password,userDateTime, email_code, focusCode ) VALUES(?, ?, ?, ?, ?, ?,NOW(),?, ?)");
      $sql->execute(array($name, $lastname, $email, $mobileNumber, $username, $password, $email_code, $focusLastResult));
      $success = "An activation email has been sent please active your account";

       $messages='<div>
       <p style="text-align:center;font-size15px;">Thanks For registering to our Busisess Complaints Website</p><br>
       <p style="text-align:center;"><a style="padding:5px 15px;" class="btn btn-info" href="http://businesscomplaints.co.za/allReviews.php" target="_blank"></a></p></did>';
      
       $headers = 'From: info@businesscomplaints.co.za : DO NOT REPLY TO THIS EMAIL' . "\r\n" .
       'Reply-To: Do Not reply to this email,' . "\r\n" .
       'X-Mailer: PHP/' . phpversion();

       mail($email, 'Confirmation Email :', $messages, $headers); 

       unset($name);
       unset($lastname);
       unset($email);
       unset($mobileNumber);
       unset($username);
       unset($password);
    }
  }
 }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>sign up</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  <link rel="stylesheet" href="swal2/sweetalert2.min.css" type="text/css" />
  <script src="swal2/sweetalert2.min.js"></script>
  <style type="text/css">
    body
   {
    font-family: 'Sintony', sans-serif;
   }
   #formDiv
   { 
     width: 40%;
     margin:30px auto;
     overflow: hidden;
     border: solid 1px #d6d6d6;
     min-width: 300px;
     border-radius: 20px;
     background-color: #fff;
     box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.2);
     font-family: 'Sintony', sans-serif;
   }
   #divForm
   {
     padding: 20px;
   }
   #fm input
   {
     border:solid 1px #838383;
   }
   #submit
   { 
     font-size: 18px;
     padding: 10px 40px;
     background: #E58E17;
     color: white;
     border: solid 1px #E58E17;
     border-radius: 0px;
     transition: 0.5s;
     margin-bottom: 5px;
   }
   #submit:hover
   {
     background-color: transparent;
     color: #E58E17  ;
     border:solid 1px #E58E17  ;
     font-size: 18px;
   }
   #successMsg
   {
    text-align: center;
    color: white;
    background-color: #38a536;
    padding: 5px 20px;
    -webkit-animation-duration : 1s;
    -webkit-animation-iteration-count:1;
    border-bottom-right-radius: 10px;
    border-top-left-radius: 10px;
   }
   #logIn
   {
     border:solid 1px #0e0654;
     color: #0e0654;
     font-size: 18px;
     padding: 10px 40px;
     text-align: center;
     text-decoration-style: none;
     text-decoration: none;
     border-radius: 0px;
     transition: .5s;
   }
   #logIn:hover
   {
     background-color: #0e0654;
     color: white;
   }
  </style>
</head>
<body>
   <div class="container-fluid">   
        <div id="formDiv">
            <p class="sign_in_title">SIGN UP HERE</p>
          <div id="divForm">	
   			<div style="margin-right: 30px;margin-left: 30px;" id="fm">
          <?php 
            if(isset($errorMsg))
            {
              ?>
              <div>
                <p class="animated shake " id="ErrorMessage" style=""><i class="fa fa-warning"></i>
                    &nbsp;<?= $errorMsg; ?></p>
              </div>
              <?php
            }
          ?>
          <?php
             if(isset($success))
             {
               ?>
                <p id="successMsg" class="animated shake"><i class="fa fa-info"></i>&nbsp; <?= $success; ?></p>
               <?php
             }
          ?>

   				<form method="post" >
   					<div class="form-group">
   						<input type="text" name="name" class="form-control" id="name" placeholder="First Name" >
   					</div>
   					<div class="form-group">
   						<input type="text" placeholder="Last Name" name="lastname" class="form-control" id="lastname">
   					</div>
   					<div class="form-group">
   						<input type="email" placeholder="Email Address" name="email" class="form-control" id="email" >
   					</div>
   					<div class="form-group">
   						<input type="number" placeholder="Mobile Number" name="mobileNumber" class="form-control" id="mobileNumber" >
   					</div>
            <div class="form-group">
              <input type="text" placeholder="Username" name="username" class="form-control" id="username" placeholder="Username" >
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" id="password" placeholder="password" >
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                   <button id="submit" type="submit" name="submit" class="btn-block" > <i class="icon ion-android-add-circle"></i> SIGN UP</button>
                </div>
               <div class="col-md-6">
                   <a href="login.php" id="logIn" name="logIn" class="btn-block" > <i class="icon ion-ios-contact"></i> LOGIN</a>
                </div>
              </div>
            </div>
   				</form>
          <!--<p style="text-align: center;">Already have an account? <a href="login.php"> Signin </a> </p>-->
          <br>
   			</div>
        </div>
   	 </div>
     <p style="" class="sign_in_title"><br></p>
   </div>
</body>
<?php include('scroll.php');?>
<?php include('footer.php');?>
</html>
<script type="text/javascript">
    setTimeout('errormessage()', 6000);
    function errormessage(){
      $("#ErrorMessage").hide("slow");
    }
</script>