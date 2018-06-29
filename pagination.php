<?php
session_start();
include('db.php');
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<style type="text/css">
	#social
  {
    padding: 5px 15px;
    font-size: 20px;
    width: 50px;
    text-align: center;
    text-decoration: none;
    margin: 2px 2px;
    border-radius: 40px;
    background-color:transparent;
    color: #959392;
    border : solid 1px #959392;
  }
  #socila:hover
  {
    opacity: 0.6;
    color: #d8d8d8;
  }
	#body
	{
		background-color: black;
		margin-top: -30px;
	}
	.slider img
	{
       display: none;
       width: 100%;
	}
	.slider img.active
	{
		
		display: block;
		width: 100%;
	}
	#prevbtn, #nextbtn
	{
		border-radius: 10px;
		background-color: transparent;
		color: white;
		padding: 6px 12px;
		border:solid 2px #8245a8; 
		font-family: 'Oswald', sans-serif;
	}
	#prevbtn:hover
	{
		background-color: #8245a8;
		animation-name: btnAnim;
	   -webkit-animation-duration : 1s ;
	   -moz-animation-duration : 1s;
	   -o-animation-duration : 1s;
	   -webkit-animation-name : btnAnim;
	   -moz-animation-name: btnAnim ;
	   -o-animation-name: btnAnim; 
	}
	@-webkit-keyframes btnAnim 
    {
	    from {background-color: transparent; color: #8245a8;}
	    to {background-color: #8245a8; color: #ffffff;}
    }
	#nextbtn:hover
	{
		background-color: #8245a8;
	    animation-name: btnNextAnim;
	   -webkit-animation-duration : 1s ;
	   -moz-animation-duration : 1s;
	   -o-animation-duration : 1s;
	   -webkit-animation-name : btnNextAnim;
	   -moz-animation-name: btnNextAnim ;
	   -o-animation-name: btnNextAnim; 
	}
	@-webkit-keyframes btnNextAnim 
    {
	    from {background-color: transparent; color: #8245a8;}
	    to {background-color: #8245a8; color: #ffffff;}
    }
	#startbtn
	{
		border-radius: 10px;
		background-color: transparent;
		color: white;
		padding: 6px 12px;
		border:solid 2px #ffffff; 
		font-family: 'Oswald', sans-serif;
	}
	#startbtn:hover
	{
		background-color: #04062d;
		color: white;
		border:solid 2px transparent;
	   animation-name: btnStart;
	   -webkit-animation-duration : 2s ;
	   -moz-animation-duration : 2s;
	   -o-animation-duration : 2s;
	   -webkit-animation-name : btnStart;
	   -moz-animation-name: btnStart ;
	   -o-animation-name: btnStart; 
	}
	@-webkit-keyframes btnStart 
    {
	    from {background-color: transparent; color: #ffffff;}
	    to {background-color: #04062d; color: #ffffff;}
    }
	</style>
	<script type="text/javascript">
    var ypos,image;
    function parallex(){
      ypos = window.pageYOffset;
      image= document.getElementById('slider');
      image.style.top = ypos * .7 + 'px';
    }
    window.addEventListener('scroll', parallex);
  </script>

	<script>
		$(document).ready(function(){
		    $(".replyIcon").click(function(){
		        $("#myform").toggle(1000);
		        $("#myReply").focus();
		    });
		    $("#para").click(function(){
		    	$(this).hide(1000);
		    });
		});
	</script>
</head>
<body>
	<div  id="body">
	
            
        <div class="slider">
        	<img src="img/slid6.jpg" class="active">
        	<img src="img/slid5.jpg">
        	<img src="img/slid3.jpg" >
        	<img src="img/slid4.jpg">
        	<img src="img/slid2.jpg">
        </div>
        <br><br>
        <p style="text-align: center;">
        <input type="button" id="prevbtn" class="btn btn-default" onclick="changeSlide('previous')" value="&laquo; Prev">
        <input type="button" id="startbtn" class="btn btn-default" onclick="slideShow(this)" value="Start Slideshow">
        <input type="button" id="nextbtn" class="btn btn-default" onclick="changeSlide('next')" value="Next  &raquo;" ></p>


        <div class="container">

		<!--<p id="para">If you Clikc on m, I wil disappear</p>
		<br><br>
		<a class="btn btn-warning replyIcon" id="btntoggle">Click Me</a>
         <br> <br> <br>
        <form style="display: none;" id="myform">
        	<div class="form-group">
        		<textarea id="myReply" cols="2" rows="4" class="form-control" style="border-radius: 0px;"></textarea>
        	</div>
        	<div class="form-group">
        		<button class="btn btn-primary" style="border-radius: 0px;"><i class="fa fa-reply"></i> Reply</button>
        	</div>
		</form>-->
		<br><br>
		
	</div>
</div>

<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript">
   var stopSlideShow = false;

  	function slideShow(caller)
  	{
  		var status = $(caller).attr('value');

  		if(status.indexOf('Start') >- 1)
  		{
           stopSlideShow = false;
           $(caller).attr('value', 'Stop Slideshow');
  		}else
  		{
           stopSlideShow = true;
           $(caller).attr('value', 'Start Slideshow');
  		}
       var interval = setInterval(function(){
       	if(!stopSlideShow)
       	   changeSlide('next');
       	else
       		clearInterval(interval);
       }, 3000);
  	}
  	function changeSlide(direction)
  	{
  		var currentImg = $('.active');
  		var nextImg = currentImg.next();
  		var previousImg = currentImg.prev();

        if(direction == 'next'){
         if(nextImg.length)
         	nextImg.addClass('active');
         else
         	$('.slider img').first().addClass('active');
       }
       else
       {
         if(previousImg.length)
         	previousImg.addClass('active');
         else
         	$('.slider img').last().addClass('active');
       }
       currentImg.removeClass('active');
  	}
  </script>
</body>
<div style="background-color: #161515;">
	<br>
	<div class="container">
		<p style="color: #8a8988;text-align: center;">Copyright  findit.com 2018 | <i class="fa fa-copyright"></i> All Rights Reserved<br><br>
         <a href="#" class="fa fa-facebook" id="social"></a> &nbsp;
          <a id="social" href="#" class="fa fa-twitter"></a>
		</p>
	</div>
	<br><br>
</div>
</html>
