<?php
session_start();
include('db.php');
include('header.php');

if(isset($_SESSION['username']))
{
  header('location:index.php');
}
if(isset($_POST["submit"]))
{
  $username = htmlspecialchars(stripcslashes($_POST["username"]));
  $password = htmlspecialchars(stripcslashes($_POST["password"]));
  $password= md5($password);

  if(empty($_POST["username"]) || empty($_POST["password"]))
  {
     $errorMsg = "username & password required";
  }
  if(!empty($_POST["username"]) AND !empty($_POST["password"]))
  {
     $query =$db->prepare('SELECT * FROM signup WHERE username = ?');
     $query->execute(array($username));
     $Count = $query->rowCount();

     if($Count > 0)
     {
      $password = md5($password);
      while ($result = $query->fetch(PDO::FETCH_ASSOC))
      {
        if($result["password"] != $_POST["password"])
        {
          $_SESSION['user_id'] = $result['user_id'];
           $_SESSION['name'] = $result['name'];
           $_SESSION['lastname'] = $result['lastname'];
           $_SESSION['email'] = $result['email'];
           $_SESSION['mobile'] = $result['mobile'];
           $_SESSION['username'] = $result['username'];
           $_session['user_type'] = $result['user_type'];
           header('location:index.php');
           
        }
       else
       {
            $errorMsg = "Wrong Password"; 
       }
     }   
    }
    else
    {
      $errorMsg = 'This username does not exist';
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
  <style type="text/css">
    #formBig
    {
       //padding: 20px;
       width: 40%;
       margin:30px auto;
       overflow: hidden;
       border: solid 1px #d6d6d6;
       border-radius: 20px;
       background-color: #fff;
       min-width: 300px;
       box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.2);
    }
    #divForm
    {
       padding: 0px 35px;
    }
    #submit
    {
       font-size: 18px;
       padding: 10px 0px 10px 0px;
       background-color:#130a43;
       color: white;
       transition: 0.5s;
    }
    #submit:hover
    {
      background-color: #fff;
      color: #3f395f;
      border:solid 1px #3f395f;
    }
    
  </style>
</head>
<body>
   <div class="container-fluid">
   	<div class="container">
   		<div id="formBig">
        <p style="" class="sign_in_title">SIGN IN</p>
        <div id="divForm">
   			<br>
   			<div >
   				<form method="POST" >
          <?php if(isset($errorMsg))
            {
            ?>
               <p class="animated shake " id="ErrorMessage" style=""><i class="fa fa-warning"></i> <?php echo $errorMsg; ?></p>
            <?php
            }
          ?>
            <div class="form-group">
              <label>Username</label><span style="color: red;">*</span>
              <input type="text" name="username" class="form-control" id="username" placeholder="Username" >
            </div>
            <div class="form-group">
              <label>Password</label><span style="color: red;">*</span>
              <input type="password" name="password" class="form-control" id="password" placeholder="password" >
            </div>
            <div class="form-group">
              <div class="pull pull-right">
                <a href="forgot.php">Forgot your password ?</a>
              </div>
            </div>
            <div class="form-group">
              <br><br>
              <button type="submit" name="submit" id="submit" class="btn btn-default btn-block"> <i class="icon ion-log-in"></i> SIGN IN</button>
            </div>
   				</form>
          <p style="text-align: center;">Create an account <a href="signup.php">Sign up </a> </p>
   			</div>
   		</div>

     </div>  
     <p style="" class="sign_in_title"><br></p>
   	</div>
   </div>
</body>
<?php include('scroll.php');?>
<?php include('footer.php');?>
</html>
<script type="text/javascript">
  setTimeout('errormessage()', 4000);
  function errormessage(){
    $("#ErrorMessage").hide("slow");
  }
</script>