
<!doctype html>
<html lang="en" class="no-js">
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link href="assets/css/animate.css" rel="stylesheet" />	
	<style>
#myBtn 
{
  display: none;
  position: fixed;
  bottom: 40px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color : #8c479b;
  color: white;
  font-weight: bold;
  cursor: pointer;
  padding: 15px;
  font-size: 20px;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  box-shadow: -2px 4px 5px 0px rgba(0,0,0,0.75);
  -webkit-box-shadow: -2px 4px 5px 0px rgba(0,0,0,0.75);
  -moz-box-shadow: -2px 4px 5px 0px rgba(0,0,0,0.75);
}

#myBtn:hover 
{
  background-color: #08073a;
  font-weight: bold;
  color: #ffffff;
}
</style>
</head>
<button onclick="topFunction()" id="myBtn" title="Go to top" class="back-to-top"><i class="icon ion-chevron-up" aria-hidden="true"></i></button>


<div style=""></div>

<script type="text/javascript">
  jQuery(document).ready(function() {
    var offset = 200;
    var duration = 700;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});

</script>

 <script >
   $(document).ready(function(e){
      $("#searchtextBox").keyup(function(){
        
        var text = $("#searchtextBox").val();
        if(text != '')
        {
          $.ajax({
          method : 'GET',
          url :'fetchCompany.php',
          data : 'txt=' + text,
          dataType ="text",
          success: function(data){
            $("#results").html(data);
          }
        });
       }
        else
        {
          $('#results').html('');
        }
      })
   });
</script>