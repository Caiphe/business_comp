<?php
session_start();
 include('db.php');
 if(isset($_SESSION['username']))
 { 
   header('location:index.php');
 }
 if(isset($_GET['section'])){
   $section = htmlspecialchars($_GET['section']);
 }
 if(isset($_POST["submit"]))
 {
 	$recup_mail = trim(htmlspecialchars(stripcslashes($_POST["email"])));

  if(empty($recup_mail) || (!filter_var($recup_mail, FILTER_VALIDATE_EMAIL)))
  {
    $errormsg = "A valid email is required";
  }
  else
  {
    $mailexist =$db->prepare('SELECT user_id FROM signup WHERE email = ?');
    $mailexist->execute(array($recup_mail));
    $mailexistcount = $mailexist->rowCount();
    $findname =$db->prepare('SELECT name FROM signup WHERE email =?');
    $findname->execute(array($recup_mail));

    if($mailexistcount == 1)
    {
       $nameresult = $findname->fetch();
       $name = $nameresult['name'];

       $_SESSION['recup_mail'] = $recup_mail;
       $recup_code = '';
       for ($i=0; $i < 8 ; $i++) { 
         $recup_code .= mt_rand(0,9);
       }
       //$_SESSION['recup_code'] = $recup_code;

       $mail_recup_exist = $db->prepare('SELECT id FROM codetable WHERE email =?');
       $mail_recup_exist->execute(array($recup_mail));
       $mail_recup_exist_count = $mail_recup_exist->rowCount();

       if($mail_recup_exist_count == 1)
       {
         $recup_insert =$db->prepare('UPDATE codetable SET code =? WHERE mail = ? ');
         $recup_insert->execute(array($recup_code, $recup_mail));
       }
       else
       {
         $recup_insert =$db->prepare('INSERT INTO codetable (email,code) VALUES (?, ?)');
         $recup_insert->execute(array($recup_mail, $recup_code));
       }
       
       $header  = "MIME-Version: 1.0\r\n";
       $header .= 'From:"Review System "'."\n";
       $header .= 'Content-Type:text/html; cherset="utf-8"'."\n";
       $header .= 'Content-Tranfer-Encoding: 8bit';
       $message = '
        <!DOCTYPE html>
        <html>
        <head>
          <title>Password Retreiving</title>
          <meta charset="utf-8">
        </head>
        <body>
         <font color="#303030">
         <div align="center">
            <table width="600px">
              <tr>
                <td>
                <br/>
                <div align="center">Hi '.$name.'<br/></div></br>
                Click <a href="http://localhost:85/WorkProject/forgot.php?section=code&code='.$recup_code.'" >here</a> to get your password
                </td>
              </tr>
              <tr>
                <td align="center">
                  <font size="2">
                      Do not reply to this email !!!
                  </font>
                </td>
              </tr>
            </table>
         </div>
         </font>
        </body>
        </html>
       ';
       mail($recup_mail, "Retreving Password", $message, $header);
    }
    else
    {
      $errormsg = "This email is not registered!!";
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>forget_Password</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  <style type="text/css">
    #submit
    {
      border: solid 1px #130a42;
      background: #130a42;
      color: white;
      border-radius: 0px;
      font-size: 18px;
      padding: 10px 0px 10px 0px
    }
    #submit:hover
    {
      background: transparent;
      color: #130a42;
    }
    #email
    {
      border: solid 1px #424244;
      border-radius:0px;
    }
   #errorm
   {
      text-align: center;
      color: white;
      background-color: #e92f37;
      padding: 5px 20px;
      -webkit-animation-duration : 1s;
      -webkit-animation-iteration-count:2;
      -moz-animation-duration:1s;
      -moz-animation-iteration-count :2;
      -o-animation-duration:1s;
      -o-animation-iteration-count:2;
      border-bottom-right-radius: 20px;
      border-top-left-radius: 20px;
   }

  </style>
</head>
<?php include('header.php') ?>
<body>
   <div class="container-fluid">
   	<div class="container">
   		<div class="">
   			<br><br><hr>
   			<p style="text-align: center;font-size:30px;font-family: 'Oswald', sans-serif;margin-bottom: 40px;">PASSWORD RECOVERY</p>
   			<div style="margin-right: 30px;margin-left: 50px;">
   				<form method="POST" style="width: 50%;margin: 20px auto;">
            <div class="form-group">
              <?php if(isset($errormsg))
              {
               ?>
                <p style="" class="animated shake" id="errorm"><i class="fa fa-warning"></i> &nbsp; <?= $errormsg ?></p>
               <?php
              }
              ?>
              <input type="email" name="email" class="form-control" id="email" placeholder="Type Your email (example@yahoo.com)..." >
            </div>
            <div class="form-group">
              <button type="submit" name="submit" id="submit" class="btn btn-default btn-block">SUBMIT</button>
            </div>
   				</form>
          <p style="text-align: center;">Create an account <a href="signup.php">Sign up </a> </p>
          <hr>
   			</div>
   		</div>
   	</div>
   	 
   </div>
</body>
<?php include('scroll.php');?>
<?php include('footer.php');?>
</html>
<script type="text/javascript">
    setTimeout('errormessage()', 5000);
    function errormessage()
    {
      $("#errorm").hide("slow");
    }
</script>