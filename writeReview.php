<?php
 session_start();
 if(!isset($_SESSION['username']))
 {
 	header('location:login.php');
 }
 else
 {
 	include('db.php');
 	include('header.php');

    if(isset($_POST['submit']))
    {
        $business = htmlspecialchars($_POST["business"]);
        $starrating = htmlspecialchars($_POST["starrating"]);
        $reviewNature = htmlspecialchars($_POST["reviewNature"]);
        $reviewTitle = htmlspecialchars($_POST["reviewTitle"]);
        $reviewTest = htmlspecialchars($_POST["reviewTest"]);
        
        if(empty($_POST["business"]))
        {
        	$errorMsg = "Company Name required";
        }
        if(!empty($_POST["business"]))
        {
        	$queryCheckcompany = $db->prepare('SELECT * FROM business WHERE company_name = ?');
        	$queryCheckcompany->execute(array($business));
        	$companyCheckCount = $queryCheckcompany->rowCount();

        	 if($companyCheckCount == 1)
        	 {
        	 	while($row = $queryCheckcompany->fetch())
        		{
        			$business = $row['company_name'];
        			$business_id = $row['business_id'];
        		}
        	 }
        	 else
        	 {
        	 	$errorMsg ="Company not yet registered";
        	 	unset($business);
        	 }
        }
        if(empty($reviewNature) || empty($reviewTitle) || empty($reviewTest) || empty($starrating))
        {
        	$errorMsg = "All fields are required";
        }
        if(!isset($errorMsg))
        {
        	$companyInsertquery = $db->prepare('INSERT INTO reviewtb (user_id, user_name, company_name, rating, review_nature,reviewTitle, review, reviewDT) VALUES (?, ?, ?, ?, ?, ?, ?,Now())');
        	$companyInsertquery->execute(array($_SESSION['user_id'],$_SESSION["name"], $business, $starrating, $reviewNature, $reviewTitle, $reviewTest ));
        	$success = "Review Posted Successfully";
        	unset($business);
        	unset($reviewNature);
        	unset($reviewTitle);
        	unset($reviewTest);
        	unset($starrating);
        }
     }
     if(isset($_POST['reset']))
     {
     	unset($business);
    	unset($reviewNature);
    	unset($reviewTitle);
    	unset($reviewTest);
    	unset($starrating);
     }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Write_a_Review</title>
	<script type="text/javascript " src="js/jquery-3.3.1.min.js"></script>
	<style type="text/css">
	body
	{
		font-family: 'Sintony', sans-serif;
	}
      #title
      {
      	margin-left: 50px;
      	font-size: 30px;
      }
      #reviewForm input
      {
      	border: solid 1px #7c7d7f;
      	border-radius: 0px;
      	font-size: 13px;
      }
      
      #errorMsg
      {
      	text-align: center;
		color: white;
		background-color: #e92f37;
		padding: 5px 20px;
		-webkit-animation-duration : 1s;
		-webkit-animation-iteration-count:2;
		border-bottom-right-radius: 10px;
		border-top-left-radius: 10px;
      }
       #successMsg
	  {
	    text-align: center;
	    color: white;
	    background-color: #38a536;
	    padding: 5px 20px;
	    -webkit-animation-duration : 2s;
	    -webkit-animation-iteration-count:1;
	    border-bottom-right-radius: 10px;
	    border-top-left-radius: 10px;
	   }
	   #myratingStars
	   {
	   	  padding: 0px;
	   	  margin: 0px;
	   }
	   #myratingStars li
	   {
	   	  list-style: none;
	   	  display: inline-block;
	   	  margin: 5px;
	   	  font-size: 35px;
	   	  font-weight: bold;
	   	  color: #6d6e70;
	   	  text-shadow: 1px 2px 4px grey;
	   }
	   #myratingStars li:hover
	   {
	   	 color: #f2b50e;
	   }
	   #myratingStars li.active,#myratingStars li.secondary-active
	   {
	   	color: #f2b50e;
	   }
	   input[type="radio"]
	   {
	   	  display: none;
	   }
	   #submit
      {
      	padding: 7px 30px;
      	font-size: 14px;
      	background: #060737;
      	border: solid 1px #595858;
      	color: white;
      	cursor: pointer;
      	border-radius: 0px;
      }
      #submit:hover
      {
      	background: transparent;
      	border: solid 1px #12134f;
      	color: #12134f;
      }
      
	   #reset
	   {
	   	 background: transparent;
	   	 cursor: pointer;
	   	 font-weight: none
	   	 font-size:14px;
	   	 color :#060737;
	   	 border:solid 1px #060737;
	   	 border-radius:0px;
	   }
	   #reset:hover
	   {
	   	 background-color: #060737;
	   	 font-size: 14px;
	   	 color: white;
	   	 border:solid 1px white;
	   	 border-radius: 0px;
	   }
	</style>
	
</head>
<body>
	<div class="container-fluid" style="background: #ffffff; margin-top: -10px;">
			 <br><p id="title">WRITE A REVIEW</p><br><br><br>
		</div>
	<div class="container-fluid" style="background: #e8e8e8;margin-top: -50px;">		
		<br>
		<div class="container" ">
           <div class="row">
           	<div  style="">
           	<div class="col-md-8" style="background: #ffffff;padding: 20px;">
	            <form method="post" id="reviewForm">
	            	<?php
                     if(isset($errorMsg))
                     {
                      ?>
                     	<p id="errorMsg" class="animated shake"><i class="icon ion-alert-circled"></i>  <?php echo $errorMsg; ?></p>
                      <?php
                     }
	            	?>
	            	<?php
	            	if(isset($success))
	            	{
	            	 ?>
	            	 <p class="animated flipInY " id="successMsg"><?php echo $success; ?> <i class="glyphicon glyphicon-ok"></i> </p>
	            	 <?php
	            	 }
	            	?>
	           	 <div class="form-group">
	           	   <span>Type the business you want to review</span><br>
	           	   <input type="text" name="business" id="business" class="form-control" placeholder="Provide a company name..." required="required">
	           	</div>
	           	<div id="result"></div>
	           	<div class="form-group">
	           		<span>Rate This Company</span><br>
	           		<!--<i class="icon ion-ios-star" style="font-size:25px;"></i>
	           		<x-star-rating value="3" id="rating" name="rating"> </x-star-rating>-->
	           			
	           	    <ul id="myratingStars">
	           	    	<li><label for="rating1"><i class="icon ion-star"></i></label><input type="radio" name="starrating" id="rating1" value="1"></li>
	           	    	<li><label for="rating2"><i class="icon ion-star"></i></label><input type="radio" name="starrating" id="rating2" value="2"></li>
	           	    	<li><label for="rating3"><i class="icon ion-star"></i></label><input type="radio" name="starrating" id="rating3" value="3"></li>
	           	    	<li><label for="rating4"><i class="icon ion-star"></i></label><input type="radio" name="starrating" id="rating4" value="4"></li>
	           	    	<li><label for="rating5"><i class="icon ion-star"></i></label><input type="radio" name="starrating" id="rating5" value="5"></li>
	           	    </ul>
	           		
	           	</div>
	           	<div class="form-group">
	           		<span>Select an option</span><br>
	           		<select name="reviewNature" class="form-control" style="border: solid 1px #7c7d7f;border-radius: 0px;" required="required">
	           			<option>Select Option</option>
	           			<option value="unknown">Unkown</option>
	           			<option value="Other">Other</option>
	           			<option value="Bad Attitude">Bad Attitude</option>
	           			<option value="Booking a Query">Booking a Query</option>
	           			<option value="Custome Service">Custome Service</option>
	           			<option value="Expire Date">Expire Date</option>
	           			<option value="Feedback / Response">Feedback / Response</option>
	           			<option value="Late / No Delevery">Late / No Delevery</option>
	           			<option value="Out of stock">Out of stock</option>
	           			<option value="Great Products">Great Products</option>
	           			<option value="Great Service">Great Service</option>
	           			<option value="Bad Service">Bad Service</option>
	           		</select>
	           	</div>
	           	<div class="form-group">
	           		<span >Review Title</span><br>
	           		<input type="text" name="reviewTitle" id="reviewTitle" class="form-control" required="required">
	           	</div>

	           	<div class="form-group">
	           		<span >Tell us your experience ...</span>
	           		<textarea name="reviewTest" id="reviewTest" class="form-control" cols="7" rows="4" placeholder="Type your review here...." style="border: solid 1px #7c7d7f;border-radius: 0px;" required="required"></textarea>
	           	</div>
	           	<div class="form-group">
	           		<div class="row">
	           			<div class="col-md-6">
	           				<button type="submit" name="submit" id="submit" class="btn btn-default btn-block"><i class="icon ion-compose"></i> Submit</button>
	           			</div>
	           			<div class="col-md-6">
	           				<button type="reset" name="reset" id="reset" class="btn btn-default btn-block"><i class="icon ion-close-circled"></i> Cancel</button>
	           			</div>
	           		</div>
	           	</div>
	           </form>
           	</div>
           	<div class="col-md-4">
           		<div style="background: #ffffff;">
           			<p style="color:#9c9c9e;text-align: justify;font-size: 12px;padding: 15px;">
           			 <span style="font-size: 17px;"><i class="icon ion-ios-information" style="color:#8245a8;"></i> Info</span><br>
           			Enter the business you wish to write a review about and select the star rating from 1 to 5 stars.<br>
                    1 star = <i>Very Bad</i> <br>
                    2 stars = <i>Bad</i> <br>
                    3 Stars = <i>Average</i> <br>
                    4 Stars = <i>Good</i> <br>
                    5 Stars = <i>Very Good</i> <br>
           			<br>
           			Select as well an option on the given list to let us know the nature of your comment.
           		    </p>
           			</div>
           			
           			<div style="background: #ffffff;">
           				<p style="color:#9c9c9e;text-align: justify;font-size: 12px;padding: 15px;">
           					 <span style="font-size: 17px;"><i class="icon ion-ios-information" style="color:#8245a8;"></i> Info</span><br>
           					 Choose a simple pricised and easy to understand title.
           				</p>
           			
           		    </div>
           		    <div style="background: #ffffff;">
           				<p style="color:#9c9c9e;text-align: justify;font-size: 12px;padding: 15px;">
           					 <span style="font-size: 17px;"><i class="icon ion-ios-information" style="color:#8245a8;"></i> Info</span><br>
           					 Please make sure you fill up all the required fields before submiting.
           				</p>
           			
           		    </div>
           	</div>
           </div>
          </div>
		</div>
     <br><br>
	</div>
</body>
<?php include('scroll.php');?>
<?php include('footer.php');?>
</html>

<script >
	$('li').on('click', function(){
		$('li').removeClass('active');
		$('li').removeClass('secondary-active');
		$(this).addClass('active');
		$(this).prevAll().addClass('secondary-active');
	});
</script>

<script >
	/*$(document).ready(function(){
       $("#business").keyup(function(){
       	var query = $(this).val();
       	if(query != '')
       	{
       		$.ajax({
       			url:"fetchCompany2.php",
       			method:"POST",
       			data:{query:query},
       			success:function(data)
       			{
       				$('#result').fadeIn();
       				$('#result').html(data);
       			}
       		});
       	 }
       });
       $(document).on('click', 'li', function(){
          $('#business').val($(this).text());
          $('$result').fadeOut();
       });
	});*/
</script>

<script type="text/javascript">
	class StarRating extends HTMLElement{
		get value(){
			return this.getAttribute('value');
		}
		set value (val){
          this.setAttribute('value', val);
          this.highlight(this.value - 1);
		}
		get number (){
			return this.getAttribute('number') ||5;
		}
		set number (val){
			this.setAttribute('number', val);
			this.stars = [];
            while(this.firstChild){
            	this.removeChild(this.firstChild);
            }
			for(let i = 0; i < this.number; i++)
			{
				let s = document.createElement('div');
				s.className = 'star';
				this.appendChild(s);
				this.stars.push(s);
			}
			this.value = this.value;
		}
		 highlight (index){
		 	this.stars.forEach((star, i) => {
		 		star.classList.toggle('full', i <= index);
		 	});
		 }
		constructor(){
			super();
			this.number = this.number;
			this.addEventListener('mousemove', e => {
               let box = this.getBoundingClientRect(),
               starIndex = Math.floor((e.pageX - box.left) / box.width * this.stars.length);
             this.highlight(starIndex);
			});
			this.addEventListener('mouseout', () => {
				this.value = this.value;
			});
			this.addEventListener('click', e => {
               let box = this.getBoundingClientRect(),
               starIndex = Math.floor((e.pageX - box.left) / box.width * this.stars.length);
               this.value = starIndex + 1;
               let rateEvent = new Event('rate');
               this.dispatchEvent(rateEvent);
			});
		}
	}
	customElements.define('x-star-rating', StarRating);
</script>
<script type="text/javascript">
	rating.addEventListener('rate', () => {
		console.log(rating);
		
	});
</script>

