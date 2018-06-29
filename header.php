<?php 
   //session_start();
   //CHAT ID: 55438515
   //Contact Mike 0838822989 
   //liandragopaul@gmail.com
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="js/data.json"></script>
  <link href="css/font-awesome.css" rel="stylesheet"> 
  <link href="css/animate.css" rel="stylesheet"> 
  <link href="css/style.css" rel="stylesheet"> 
  <script src="bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="bower_components/sweetalert2/dist/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="swal/sweetalert2.min.css" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="swal/sweetalert2.min.css">
  <link href="https://fonts.googleapis.com/css?family=Khand|Rajdhani|Shrikhand|Sintony" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="ionicons/css/ionicons.min.css">

<!--<script type="text/javascript">
  function add_chatinline(){var hccid=55438515;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
  add_chatinline(); 
</script>-->

<style type="text/css">
#profileUser
{
  background-color: transparent !important;
}
#profileUser:hover
{
  background-color: transparent !important;
  background:transparent !important;
}
#profileNav li
{
background-color: white;
}
.sticky 
{
  position: fixed;
  top: 0;
  width: 100%
}
.sticky + .content 
{
  padding-top: 60px;
}
.navbar ul li a
{
  text-decoration: none;
  color: #f2f2f2;
  font-size: 14px;
  font-family: 'Sintony', sans-serif;
}
.navbar ul li 
{
  color: white;
  display: block;
  margin-right: 5px;
  font-size: 14px;
  font-family: 'Sintony', sans-serif;
}

  .dropdown 
{
  position: relative;
  display: inline-block;
}
.dropdown-content 
{
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a 
{
  color: black;
  padding: 11px 16px;
  text-decoration: none;
  display: block;
  font-family: 'Sintony', sans-serif;
}

a:hover
{
  text-decoration: none;
  font-family: 'Sintony', sans-serif;
}
#navbar
{
  z-index: 99;
  width: 100%;
  border: solid 2px transparent;
  border-radius: 0px;
}
.sticky 
{
  position: fixed;
  top: 0;
  width: 100%;
}
#navSign li
{
  color:black;
  position: relative;
  background-color: transparent;
  font-size: 14px;
}
#navSign li :hover
{
  background-color: transparent;
  background:transparent;
  color:#04062d ;
  font-size: 14px;
}
#writeRv
{
 background: #8245a8;
 color: white;
 text-align: center;
 font-size: 15px;
 border: solid 1px white;
 padding: 13px 14px;
 border-radius: 0px;
}

#writeRv:hover
{
 background: transparent;
 color: white;
 font-size: 15px;
 border: solid 1px white;
 animation-name: myReviewBtn;
-webkit-animation-duration : 2s ;
-moz-animation-duration : 2s;
-o-animation-duration : 2s;
-webkit-animation-name : myReviewBtn;
-moz-animation-name: myReviewBtn ;
-o-animation-name: myReviewBtn;
  
}
@-webkit-keyframes myReviewBtn 
{
  from {background-color: transparent; color: #8245a8;}
  to {background-color: #8245a8; color: #ffffff;}
}
#profileNav li
{
  background: white;
  font-weight: normal;
  font-size: 14px;
  color: #393a3a;
  cursor: pointer;
}
#profileNav li:hover
{
 background-color: #bbbdbf;
 display: block;
 color: #393a3a;
 cursor: pointer;
 font-size: 14px;
}
#MainNav ul li a
{
 font-size: 15px;
 color: white;
 display: block;
 font-family: 'Sintony', sans-serif;
 cursor: pointer;
 border:solid 1px transparent;
}
#MainNav ul li a:hover
{
 display: block;
 background: #8245a8;
 color: white;
 border:solid 1px white;
 animation-name: btntrans;
-webkit-animation-duration : 1s ;
-webkit-animation-name : btntrans;
-moz-animation-name: 2s ;
-moz-animation-duration : btntrans;
border-radius: 10px;
}
@-webkit-keyframes btntrans 
{
    from {background-color: transparent; color: #8245a8;}
    to {background-color: #8245a8; color: #ffffff;}
}

@-moz-keyframes btntrans 
{
    from {background-color: transparent; color: #8245a8;}
    to {background-color: #8245a8c; color: #ffffff;}
}
@keyframes btntrans 
{
    from {background-color: transparent; color: #8245a8;}
    to {background-color: #8245a8; color: #ffffff;}
}
.navbar .bottomMenu
{
   display: none;
}
#normalStar
 {
    margin:5px 1px;
    font-size: 23px;
 }
 #green
 {
   margin:5px 1px;
    font-size: 23px;
    color: #237717;
 }
 #lightgreen
 {
    margin:5px 1px;
    font-size: 23px;
    color: #70cc63;
 }
 #orange
 {
    margin:5px 1px;
    font-size: 23px;
    color: #ef8f09;
 }
 #lightorange
 {
  margin:5px 1px;
    font-size: 23px;
    color: #e2b044;
 }
 #red
 {
  margin:5px 1px;
    font-size: 23px;
    color: #ba0514;
 }
 #reviewResult
  {
    text-align:justify;
    padding:8px 25px; 
  }
  #reviewDiv
  {
     background-color:#f6f6f6;
     width:95%;
     border-bottom-left-radius:30px;
     border-top-right-radius:30px;
  }
  </style>

</head>
<body onscroll="myFunction()">
  <div class="container-fluid" >
    <div class="row">
      <div class="col-md-6 col-sm-1">
        <a class="thumbnail" style="border:solid 1px transparent;float: left;" href="index.php"><img src="img/logofind22.jpg"></a>
      </div>
      <div class="col-md-6 col-sm-1">
      <br>
      <div class="" style="float: right;margin-right:50px;">
      <ul class="nav navbar-nav navbar-right" id="navSign" style="">
          <?php 
           if(!isset($_SESSION["username"]))
           {
             ?>
            <li><a href="signup.php"><span "><i class="icon ion-person-stalker"></i> Sign Up</span></a></li>
            <li><a href="login.php"><span ><i class="icon ion-log-in"></i> Login</span></a></li>
            <?php
           }
           else
           {
          ?>
        <ul class="nav navbar-nav navbar-right" id="profileNav">
            <li class="dropdown" id="navSetting">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="profileUser"> <i style="font-size: 23px;" class="icon ion-ios-contact-outline"></i> <span class="caret"></span> 
                <span> Hi <?php echo $_SESSION['name'] ?></span> </a>
            <ul class="dropdown-menu">
              <li id="NavSetting"><a href="editProfile.php"><i class="icon ion-wrench"></i> Edit Profile</a></li>
              <li id="NavLogout"><a href="logout.php"><i class="icon ion-log-out"></i> Logout</a></li>
              
           </ul>
       </li>
      </ul>
         <?php
         }
        ?>
    </ul>
   </div>
  </div>
 </div>

 
</div>
<nav class="navbar navbar-default" style="background-color: #130a42;" id="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#MainNav" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>

    <div class=" collapse navbar-collapse" id="MainNav">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><i class="glyphicon glyphicon-home" style="color: white;"></i> Home</a></li>
        <li><a href="allReviews.php">All Reviews</a></li>
        <li><a href="business.php">Business Registration</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="terms.php">Terms & Conditions</a></li>
        <li><a href="#">Legal</a></li>
      </ul>      
      <ul class="nav navbar-nav navbar-right" style="margin-right: 30px;" id="navBarRight">
        </li>&nbsp;&nbsp;
        <div class="navbar-right" >
          <a class="btn btn-default" href="writeReview.php" id="writeRv"><i class="icon ion-ios-compose-outline"></i> Write a Review</a>
         </div>
      </ul>      
    </div>
 </nav>
</body>
</html>

<script>
window.onscroll = function() {myFunction()};
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
