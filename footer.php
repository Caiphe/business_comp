<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  .fa-facebook 
  {
    padding: 9px 10px;
    font-size: 20px;
    width: 40px;
    height: 40px;
    text-align: center;
    text-decoration: none;
    margin: 2px 2px;
    border-radius: 50%;
    background-color:transparent;
    color: #959392;
    border : solid 1px #959392;
  }
  .fa-facebook:hover
  {
    color: #17408b;
  }
  .fa-twitter 
  {
    padding: 9px 10px;
    font-size: 20px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    text-align: center;
    text-decoration: none;
    margin: 2px 2px;
    background-color:transparent;
    color: #959392;
    border : solid 1px #959392;
  }
</style>
</head>
<body>
<br>
<div class="container">
	<div style="width: 60%;margin: 0px auto;">
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <p style="padding: 5px 20px;text-align: center;color:#7d7d7e;border-top: solid 1px #a5a4a4;border-bottom: solid 1px #a5a4a4;">Hello out there. This is where you can search any business and share your experince with that particular business to help the next person.</p>
      </div>
      <div class="item">
        <p style="padding: 5px 20px;text-align: center;color:#7d7d7e;border-top: solid 1px #a5a4a4;border-bottom: solid 1px #a5a4a4;">Hello out there. This is where you can search any business and share your experince with that particular business to help the next person.</p>
      </div>
      <div class="item">
       <p style="padding: 5px 20px;text-align: center;color:#7d7d7e;border-top: solid 1px #a5a4a4;border-bottom: solid 1px #a5a4a4;">Hello out there. This is where you can search any business and share your experince with that particular business to help the next person.</p>
      </div>
    </div>
  </div>
  </div>
 </div>
<!--<div style="background-color: #464546;">
	<br><br><br>	
</div>-->
<div style="background-color: #161515;">
	<br>
	<div class="container">
		<p style="color: #8a8988;text-align: center;">Copyright  findit.com 2018 | <i class="fa fa-copyright"></i> All Rights Reserved<br><br>
         <a href="#" class="fa fa-facebook" id="social"></a> &nbsp; 
         <a id="social" href="#" class="fa fa-twitter"></a>
         <br>
		</p>
    <br>
	</div>
	
</div>
</body>
</html>
<script type="text/javascript">
  setTimeout('errormessage()', 3000);
  function errormessage(){
    $("#errorMsg").hide("slow");
  }
</script>
<script type="text/javascript">
  setTimeout('cachei()', 3000);
  function cachei(){
    $("#successMsg").hide("slow");
  }
</script>
<script type="text/javascript">
  $(document).scroll(function () {
      var y = $(this).scrollTop();
      if (y > 270) {
          $('.bottomMenu').fadeIn();
      } else {
          $('.bottomMenu').fadeOut();
      }
  });
</script>