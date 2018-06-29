<?php
    session_start();
 	include('db.php');
 	include('header.php');

 	$fetchreview = $db->prepare('SELECT * FROM reviewtb WHERE company_name = ? ORDER BY reviewDT DESC');
 	$fetchreview ->execute(array($_SESSION['business']));
 	$reviewCount = $fetchreview->rowCount();

 	$fetchreview2 =$db->prepare('SELECT * FROM reviewtb WHERE company_name = 
 		?');
 	$fetchreview2->execute(array($_SESSION['business']));
 	$reviewCount2 =$fetchreview2->rowCount();

 	if($reviewCount2 > 0)
 	{
 		while($rvcnt = $fetchreview2->fetch())
 		{
 			$company = $rvcnt['company_name'];
 			$usrid = $rvcnt['user_id'];
 		}
 	}
 	$allthecount = '';
 	$queryCount =$db->prepare('SELECT company_name FROM reviewtb WHERE company_name = ? ');
 	$queryCount->execute(array($company));
    if($queryCount->rowCount() > 0)
    {
       $allthecount=$queryCount->rowCount();
    }
    else
    {
    	$allthecount = "0";
    }
   /// Get All users Detail From Signup Table Contact Mike 0838822989 
   //mikem@identicasolutions.co.za
   $queryUserDetails = $db->prepare('SELECT * FROM signup WHERE user_id = ?');
   $queryUserDetails->execute(array($usrid));
    while($userdtls = $queryUserDetails->fetch())
	{
		$userName = $userdtls['name'];
	    $used = $userdtls['user_id'];
	    $focusCode = $userdtls['focusCode'];
	}
    $fetchCompanyDetail=$db->prepare('SELECT * FROM business WHERE company_name = ?');
    $fetchCompanyDetail->execute(array($_SESSION["business"]));

    while($compdet = $fetchCompanyDetail->fetch())
    {
		$physical_address = $compdet['physical_address'];
		$province = $compdet['province'];
		$city = $compdet['city'];
		$postalcode = $compdet['postalcode'];
		$contact_number = $compdet['contact_number'];
		$company_email = $compdet['company_email'];
		$registration_name = $compdet['registration_name'];
		$reg_number = $compdet['reg_number'];
		$vat_reg_number = $compdet['vat_reg_number'];
		$industry = $compdet['industry'];
		$Website = $compdet['website'];
    }
    $getReviewId =$db->prepare("SELECT * FROM reviewtb WHERE review_id =? ");
    $getReviewId->execute(array($usrid));
    
    $comp = $_SESSION["business"];
    $idust = $_SESSION["industry"];
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reviews</title>
	<style type="text/css">
	body
	{
		font-family: 'Sintony', sans-serif;
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
     
	 #like
	 {
	  	position: relative;
	    display: inline-block;
	 	font-size:20px;
	 	color:#9c9c9e;
	 	cursor: pointer;
	 }
	 #like:hover
	 {
	 	color: #1f5a07;
	 }

	#like .tooltiptext 
	{
	    visibility: hidden;
	    width: 70px;
	    background-color: #474647;
	    color: #fff;
	    font-size: 11px;
	    font-family: 'Sintony', sans-serif;
	    text-align: center;
	    border-radius: 6px;
	    padding: 5px 0;
	    position: absolute;
	    z-index: 1;
	    bottom: 125%;
	    left: 50%;
	    margin-left: -30px;
	    opacity: 0;
	    transition: opacity 0.3s;
	}

	#like .tooltiptext::after {
	    content: "";
	    position: absolute;
	    top: 100%;
	    left: 50%;
	    margin-left: -5px;
	    border-width: 5px;
	    border-style: solid;
	    border-color: #555 transparent transparent transparent;
	}

	#like:hover .tooltiptext {
	    visibility: visible;
	    opacity: 1;
	}

	#dislike
	 {
	  	position: relative;
	    display: inline-block;
	 	font-size:20px;
	 	color:#9c9c9e;
	 	cursor: pointer;
	 }
	 #dislike:hover
	 {
	 	color: #860a16;
	 }

	#dislike .tooltiptext 
	{
	    visibility: hidden;
	    width: 70px;
	    background-color: #474647;
	    font-family: 'Sintony', sans-serif;
	    color: #fff;
	    font-size: 11px;
	    text-align: center;
	    border-radius: 6px;
	    padding: 5px 0;
	    position: absolute;
	    z-index: 1;
	    bottom: 125%;
	    left: 50%;
	    margin-left: -30px;
	    opacity: 0;
	    transition: opacity 0.3s;
	}

	#dislike .tooltiptext::after {
	    content: "";
	    position: absolute;
	    top: 100%;
	    left: 50%;
	    margin-left: -5px;
	    border-width: 5px;
	    border-style: solid;
	    border-color: #555 transparent transparent transparent;
	}

	#dislike:hover .tooltiptext {
	    visibility: visible;
	    opacity: 1;
	}

	/*REPLY */
	#dislikes
	 {
	  	position: relative;
	    display: inline-block;
	 	font-size:20px;
	 	color:#9c9c9e;
	 	cursor: pointer;
	 }
	 #dislikes:hover
	 {
	 	color: #860a16;
	 }
	#dislike .tooltiptext 
	{
	    visibility: hidden;
	    width: 70px;
	    background-color: #474647;
	    font-family: 'Sintony', sans-serif;
	    color: #fff;
	    font-size: 11px;
	    text-align: center;
	    border-radius: 6px;
	    padding: 5px 0;
	    position: absolute;
	    z-index: 1;
	    bottom: 125%;
	    left: 50%;
	    margin-left: -30px;
	    opacity: 0;
	    transition: opacity 0.3s;
	}

	#dislike .tooltiptext::after 
	{
	    content: "";
	    position: absolute;
	    top: 100%;
	    left: 50%;
	    margin-left: -5px;
	    border-width: 5px;
	    border-style: solid;
	    border-color: #555 transparent transparent transparent;
	}

	#dislike:hover .tooltiptext {
	    visibility: visible;
	    opacity: 1;
	}
	
	</style>
	
</head>
<body>
<div class="container-fluid" style="background-color: #e8e5e5;margin-top: -20px; ">
	<div class="container" style="background:#ffffff;">
			<br>
			<div class="row">
				<div class="col-md-3">
					<a class="thumbnail" style="background: transparent;border:solid 1px transparent;"><img src="img/icon.jpg"></a>
				</div>
				<div class="col-md-3">
					<br>
					<p style="font-size:20px;font-weight: bold;color: #494948;text-align: center;">
					 <?php echo $company ?><br>
                     <span style="font-size: 13px;color:#ef8f09;"><i><?php echo $_SESSION['industry']; ?></i></span><br>

                     
					</p>
				</div>
				<div class="col-md-3">
					<br>
					<p style="font-size: 20px;font-weight: bold;color: #494948;text-align: center;">Reviews <br>
					<span style="font-size: 13px;color:#ef8f09;"><i><?php echo $allthecount; ?></i> <i class="icon ion-speakerphone"></i></span>
					</p>

				</div>
				<div class="col-md-3">
					<br>
					<p style="font-size: 20px;font-weight: bold;color: #494948;text-align: center;">Industry<br>
                    <span style="font-size: 13px;color:#ef8f09;"><i><?php echo $_SESSION["industry"]; ?></i></span>
					</p>
				</div>
			</div>
	     </div>
	     <br>
	     <div class="container" style="background-color: #ffffff;">
	     	<br><hr>
	     	
	     		
	<?php
     	while($row =$fetchreview->fetch())
     	{
	     	$datetime = $row['reviewDT'];
 			$title = $row['reviewTitle'];
 			$reviewNature = $row['review_nature'];
 			$reviewDate = $row['reviewDT'];
 			$review = $row['review'];
 			$userid = $row['user_id'];
 			$rating = $row['rating'];
 		       
 			$reviewid = $row['review_id'];
         		    	
            if($rating == "5")
            {
            	$value ='
            	 <i id="green" class="icon ion-ios-star "></i>
	             <i id="green" class="icon ion-ios-star "></i>
	             <i id="green" class="icon ion-ios-star "></i>
	             <i id="green" class="icon ion-ios-star "></i>
	             <i id="green" class="icon ion-ios-star "></i>
            	';
            }
            if($rating == "4")
            {
            	$value ='
            	 <i id="lightgreen" class="icon ion-ios-star "></i>
	             <i id="lightgreen" class="icon ion-ios-star "></i>
	             <i id="lightgreen" class="icon ion-ios-star "></i>
	             <i id="lightgreen" class="icon ion-ios-star "></i>
	             <i id="normalStar" class="icon ion-ios-star "></i>
            	';
            }
            if($rating == "3")
            {
            	$value ='
            	 <i id="orange" class="icon ion-ios-star "></i>
	             <i id="orange" class="icon ion-ios-star "></i>
	             <i id="orange" class="icon ion-ios-star "></i>
	             <i id="normalStar" class="icon ion-ios-star "></i>
	             <i id="normalStar" class="icon ion-ios-star "></i>
            	';
            }
            if($rating == "2")
            {
            	$value ='
            	 <i id="lightorange" class="icon ion-ios-star "></i>
	             <i id="lightorange" class="icon ion-ios-star "></i>
	             <i id="normalStar" class="icon ion-ios-star "></i>
	             <i id="normalStar" class="icon ion-ios-star "></i>
	             <i id="normalStar" class="icon ion-ios-star "></i>
            	';
            }
            if($rating == "1")
            {
            	$value ='
            	 <i id="red" class="icon ion-ios-star "></i>
	             <i id="normalStar" class="icon ion-ios-star "></i>
	             <i id="normalStar" class="icon ion-ios-star "></i>
	             <i id="normalStar" class="icon ion-ios-star "></i>
	             <i id="normalStar" class="icon ion-ios-star "></i>
            	';
            }
 			$getdate = date('Y-M-d', strtotime($reviewDate));
 			$gettime = date('g:i a', strtotime($reviewDate));

			// Get All users ID of the Sesion Company Variable
	        //njkanenungo@gmail.com
	        //Extravaganza@1001
	        //Nickname : leroux


	       //Get The name of the user using the ID from review Table
		    $getusername =$db->prepare("SELECT name FROM signup WHERE user_id = ?");
		    $getusername->execute(array($userid));

			while($rowUser = $getusername->fetch())
		    {
		      $CompanyUser = $rowUser['name'];
		    }
		    $sqlFocusCode = $db->prepare('SELECT focusCode FROM signup WHERE user_id = ?');
		    $sqlFocusCode->execute(array($userid));

		    while($rw = $sqlFocusCode->fetch())
		    {
               $fcsCode = $rw['focusCode'];
		    }

		    $countUserReview = $db->prepare('SELECT * FROM reviewtb WHERE user_id = ?');
		    $countUserReview->execute(array($userid));
		    $mycount =$countUserReview->rowCount();

		    if($mycount == 1)
		    {
		    	$mycountr = $mycount.' '.'Review';
		    }
		    if($mycount > 1)
		    {
		    	$mycountr = $mycount.' '.'Reviews';
		    }	
		    $likeCounts = $db->prepare('SELECT review_id FROM likes WHERE review_id = ?');
		    $likeCounts->execute(array($reviewid));
		    $mycount = $countUserReview->rowCount();
    
		    if($likeCounts->rowCount() == 0)
		    {
		    	$result = 0;
		    }
		    else
		    {
		    	$result = $likeCounts->rowCount();
		    }

		    $dislikecount = $db->prepare('SELECT review_id FROM dislikes WHERE review_id = ?');
		    $dislikecount->execute(array($reviewid));
		    $mycount = $countUserReview->rowCount();
    
		    if($dislikecount->rowCount() == 0)
		    {
		    	$results = 0;
		    }
		    else
		    {
		    	$results = $dislikecount->rowCount();
		    }

 			$review = '
 			<div class="row">
 			<div class="col-md-2">
	 			<p style="text-align:center;font-size:15px;">
	 			<img src="img/user.jpg" style="height:150px;width:150px;border-radius:50%;"/>
	             <br><b>'.$CompanyUser.'</b><br>
	             <span style="font-size:11px;color:#a5a5a6;"><i>'.$mycountr.' </i> </span>
	             </p>
 			</div>
	     	<div class="col-md-8">
             <div class="panel panel-default">
				<div class="panel-heading"><b><span style="color:#750707;"><i>'.$company.'</i></span></b></div>
				  <div class="panel-body">
				    <label><b>'.$title.'</b><br></label><br>
				    <label>'.$value.'</label><br>
				    <a href=""  >"'.$review.'"</a><br><br>
				    <p style="color:#a3a3a4;font-size:12px;border-top:solid 1px #e5e5e5;padding:3px; ">Published on : <i class="icon ion-android-calendar" ></i>&nbsp;&nbsp;'.$getdate.' &nbsp; At : 
				    <i class="icon ion-ios-time-outline" ></i>&nbsp;&nbsp;'.$gettime.'</p>
				  </div> 
				  <div class="panel-footer">
				                       
                     <a href="#void" ><i class=" fa fa-mail-reply '.$reviewid.'" name="reply"   id="like">
                     <span class="tooltiptext">Reply &nbsp;&nbsp;</span>
				   </i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				   <a href="action.php?t=1&id='.$reviewid.'"><i class="fa fa-thumbs-up"   id="like">
                     <span class="tooltiptext">Like &nbsp;&nbsp;</span><span>'.$result.'</span>
				   </i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				   <a href="action.php?t=2&id='.$reviewid.'"><i class="fa fa-thumbs-down" id="dislike">
                      <span class="tooltiptext">Dislike &nbsp;&nbsp;</span><span>'.$results.'</span>
				   </i></a> 
				  </div>
				    <script>
						$(document).ready(function(){
						    $(".'.$reviewid.'").click(function(){
						        $("#'.$reviewid.'").show(1000);
						        $("#'.$fcsCode.'").focus();
						    });
						});
					</script>

	  <form style="display: none;" id="'.$reviewid.'" method="post" action="replies.php?id='.$reviewid.'">
    		<textarea id="'.$fcsCode.'" name="myReply" cols="2" rows="2" class="form-control reply_review" style="border-radius: 0px;" placeholder="Type your message here...">
    		</textarea>
    		<br>
    		<button type="submit" name="btnReply" id= "'.$fcsCode.'"class="btn btn-primary" style="border-radius: 0px;"  href="replies.php?id='.$reviewid.'"><i class="fa fa-reply"></i> Reply </button>
      </form>

		          <script>
					$(document).ready(function(){
					    $(".btn-primary").click(function(){
					        $("#'.$reviewid.'").hide(1000);
					    });
					});
				  </script>
				</div>
			  </div>
			 <div class="col-md-2"></div>
		 </div>
 			';
	         echo $review;	
	   }

	   /*$getReviewId = $db->query('SELECT * FROM reply ORDER BY id DESC');
	   while($r = $getReviewId->fetch())
	   {
	   	$revId = $r["review_id"];
	   $displayReply =$db->prepare("SELECT * FROM reply WHERE review_id  = ?");
  	   $displayReply->execute(array($revId));
  	   $replycount = $displayReply->rowCount();
  	   if($replycount > 0)
  	   {
  	   	 while($repRow =$displayReply->fetch())
  	   	 {
  	   	 	$replyOutput ='';
  	   	 	$replyDate = $repRow["replyDT"];
  	   	 	$uid = $repRow["user_id"];

  	   	 	$getReplyDate = date('Y-M-d', strtotime($replyDate));
 			$getReplyTime = date('g:i a', strtotime($replyDate));

 			$getUsern = $db->prepare("SELECT * FROM signup WHERE user_id = ?");
 			$getUsern->execute(array($uid));

 			while($getnam = $getUsern->fetch())
 			{
              $nam = $getnam['name'];
 			}

  	   	 	$replyOutput .='
              <div class="panel panel-default">
				  <div class="panel-heading"><span>By <b><span class="text-danger">'.$nam.'</b></span> &nbsp;&nbsp; on &nbsp<span class="text-warning">'.$getReplyDate.'</span> &nbsp;&nbsp;at &nbsp;'.$getReplyTime.'</span></div>
				  <div class="panel-body">
				    <span class="text-primary">'.$repRow['reply_review'].'</span><br>
				  </div>
				  <div class="panel-footer">
				   <button class="btn btn-default btn-sm" ">Reply</button>
				  </div>
			  </div>
			  <br>
  	   	 	';
  	   	 }
  	   }
  	   else{
  	   	 $replyOutput ="";
  	   }
  	   echo $replyOutput;	  
	  }*/
	?>
	           
	     </div>
	     <br><br>
       
	      <div class="container" style="background-color: #ffffff;">
	      	<div class="row">
	      		<div style="padding: 20px;font-style: font-family: 'Sintony', sans-serif;">

	      		<div class="col-md-4">
	      			<p style="font-size: 20px;font-weight: bold;">Address :</p>
	      			<p><?php echo $physical_address ?> <br>
	      				<?= $province ?> <br><?= $city ?>&nbsp;<?= $postalcode ?>
	      			</p>
	      		</div>

	      		<div class="col-md-4">
	      			<p style="font-size: 20px;font-weight: bold;">Contact Details :</p>
	      			<table >
	      				<tr>
	      					<td><b>Contact Number</b> &nbsp;</td><td> : <?=$contact_number ?></td>
	      				</tr>
	      				<tr>
	      					<td><b>Email Address</b> &nbsp;</td><td> : <?= $company_email ?></td>
	      				</tr>
	      				<tr>
	      					<td><b>Website</b> &nbsp;</td><td> : <a href="<?php echo $Website; ?>" target="_blank"><?= $Website ?></a></td>
	      				</tr>
	      			</table>
	      		</div>

	      		<div class="col-md-4">
	      			<p style="font-size: 20px;font-weight: bold;">More Details :</p>
	      			<table>
	      				<tr>
	      					<td><b>Reg Name</b> &nbsp;</td>
	      					<td> : <?= $registration_name ?></td>
	      				</tr>
	      				<tr>
	      					<td><b>Reg No</b> &nbsp;</td>
	      					<td> : <?= $reg_number ?></td>
	      				</tr>
	      				<tr>
	      					<td><b>Vat Number</b> &nbsp;</td>
	      					<td> : <?= $vat_reg_number ?></td>
	      				</tr>
	      			</table>
	      		</div>
	      		<br><br>
	      		</div>
	      	</div>
	      	<hr>
	      </div>
	      <br><br>
	</div>
</body>
<?php include('scroll.php') ?>
<?php include('footer.php') ?>
</html>
<script type="text/javascript">
	/*$(document).ready(function(){
		$("#'.$reviewid.'").on('submit', function (event){
          var form_data = $(this).serialize();
		});
	});*/
</script>
