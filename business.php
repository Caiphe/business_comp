<?php
 session_start();
 include('db.php');
 include('header.php');

 if(!isset($_SESSION['username']))
 {
 	header('location:login.php');
 }
 else
 {
 if(isset($_POST['submit']))
 {
 	$CompanyName = htmlspecialchars($_POST["companyName"]);
 	$RegistredName = htmlspecialchars($_POST["RegistredName"]);
 	$regNumber = htmlspecialchars($_POST["regNumber"]);
 	$VatNumber = htmlspecialchars($_POST["VatNumber"]);
 	$industry = htmlspecialchars($_POST["industry"]);
 	$contactNumber = htmlspecialchars($_POST["contactNumber"]);
 	$CompanyEmail = htmlspecialchars($_POST["CompanyEmail"]);
 	$city = htmlspecialchars($_POST["city"]);
 	$physicalAddress = htmlspecialchars($_POST["physicalAddress"]);
 	$province = htmlspecialchars($_POST["province"]);
 	$postalCode = htmlspecialchars($_POST["postalCode"]);
 	$website = htmlspecialchars($_POST["website"]);
 	$users = $_SESSION["name"];
	$surNa = $_SESSION['username'];
    $us = $users.' '.$surNa;
 	$error = false;
   	
   	if(isset($regNumber) && !empty($regNumber))
   	{
	     $sqlRegNum = $db->prepare('SELECT * FROM business WHERE reg_number = ?');
	     $sqlRegNum ->execute(array($regNumber));
	     $result1 = $sqlRegNum->rowCount();

	     if($result1 > 0)
	     {
	     	$error = true;
	     	$errorMsg = "Registration Number exists already";
	     }
   	}
   	if(isset($VatNumber) && !empty($VatNumber))
   	{
   		$sqlVatnum =$db->prepare('SELECT * FROM business WHERE vat_reg_number = ?');
   		$sqlVatnum->execute(array($VatNumber));
   		$result2 = $sqlVatnum->rowCount();

   		if($result2 > 0)
   		{
			$error = true;
			$errorMsg = "Vat number exists already";
   		}
   	}
   	if(isset($CompanyEmail) && !empty($CompanyEmail))
   	{
   		$queryEmail = $db->prepare('SELECT * FROM business WHERE company_email = ?');
   		$queryEmail->execute(array($CompanyEmail));
   		$result3 = $queryEmail->rowCount();

   		if($result3 > 0)
   		{
   			$error = true;
   			$errorMsg = "This email exists already";
   		}
   	}
   	if(!filter_var($CompanyEmail, FILTER_VALIDATE_EMAIL))
   	{
   		$error = true;
   		$errorMsg ="This is a wrong email";
   	}
   	if(empty($website))
   	{
   		$error = true;
   		$errorMsg ="website required";
   	}
   	if(empty($CompanyName) || empty($RegistredName) || empty($regNumber) || empty($VatNumber) || empty($industry) || empty($contactNumber) || empty($CompanyEmail) || empty($city) || empty($physicalAddress) || empty($province) || empty($postalCode))
   	{
   		$error = true;
   		$errorMsg = "All fields are required";
   	}

   	if(!$error)
   	{ 

	$sqlInsert = $db->prepare('INSERT INTO business (company_name, registration_name, reg_number, vat_reg_number, industry, contact_number, company_email, website, physical_address, city, province, postalcode, registeredBy ,date_Time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,Now())');

    $sqlInsert->execute(array($CompanyName, $RegistredName, $regNumber, $VatNumber, $industry, $contactNumber, $CompanyEmail, $website, $physicalAddress,$city,  $province, $postalCode, $us));
      unset($CompanyName,$RegistredName,$regNumber,$VatNumber,$industry,$contactNumber,$CompanyEmail,$website,$city,$physicalAddress,$province,$postalCode);
      $success = 'Company successfully Registered';

     }
   }
 }
?>
<!DOCTYPE html>
<html>
<head>
<title>RegisterBusiness</title>
<link href="https://fonts.googleapis.com/css?family=Khand|Rajdhani|Shrikhand|Sintony" rel="stylesheet">
 <style type="text/css">
 body
 {
 	font-family: 'Sintony', sans-serif;
 }
	#formDiv
	{
		padding: 10px 20px;
		padding: 10px 20px;
		box-shadow: 0px 8px 10px 0px rgba(0,0,0,0.2);
		background-color: white;
	}
	#submit
	{
		background: #130a42;
		padding: 9px 40px;
		border-radius: 0px;
		color: #050528;
		font-size: 17px;
		color: #fff;
		border: solid 1px black;
	}
	#submit:hover
	{
		background-color:transparent;
		border:solid 1px #050528;
		color: #050528;
		font-size: 17px;
	}
	#formDiv input
	{
		border:solid 1px #4a4a49;
		padding: 20px;
		border-radius: 0px;
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
		-webkit-animation-duration : 1s;
		-webkit-animation-iteration-count:1;
		border-bottom-right-radius: 10px;
		border-top-left-radius: 10px;
	}
	#myImage
	{
		border-radius: 20px;
	}
    #mainDiv
    {
    	background-color: #ececec;margin-top: -20px;
    }
</style>
</head>
<body>
	<div  id="mainDiv">
		 <br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			   <div id="formDiv">
			      	 <form method="post">
			      	 	 <div class="form-group">
			      	 	 	<br>
			      	 	 	<p style="font-size:30px;font-family: 'Sintony', sans-serif;color: #a02323;">COMPANY DETAILS</p>
			      	 	 	<?php 
			      	 	 if(isset($success))
			      	 	 {
			      	 	  ?>
			      	 	 	<p class="animated fadeInLeftBig" id="successMsg"><i class="fa fa-ok"></i> <?= $success; ?></p>
			      	 	  <?php
			      	 	 }
			      	 	 ?>
			      	 	 <?php
			      	 	 if(isset($errorMsg)){
			      	 	 ?>
			      	 	   <p class="animated shake " id="errorMsg" style=""><i class="fa fa-warning"></i>
			      	 	   	&nbsp;<?= $errorMsg; ?></p>
			      	 	 <?php
			      	 	 }
			      	 	 ?>
			      	 	 	<div class="row">
			      	 	 		<div class="col-md-6">
			      	 	 			<input type="text" name="companyName" id="companyName" class="form-control" placeholder="Company Name..." required="required"> 
			      	 	 		</div>
			      	 	 		<div class="col-md-6">
			      	 	 			<input type="text" name="RegistredName" id="RegistredName" class="form-control" placeholder="Registered Name..." required="required">
			      	 	 		</div>
			      	 	 	</div>
			      	 	 </div>
			      	 	 <div class="form-group">
			      	 	 	<div class="row">
			      	 	 		<div class="col-md-6">
			      	 	 			<input type="text" name="regNumber" id="regNumber" class="form-control" placeholder="Company registration number..." required="required">
			      	 	 		</div>
			      	 	 		<div class="col-md-6">
			      	 	 			<input type="text" name="VatNumber" id="VatNumber" class="form-control" placeholder="Vat Registration Number..." required="required">
			      	 	 		</div>
			      	 	 	</div>
			      	 	 </div>
			      	 	 <div class="clearfix"></div>
			      	 	 <div class="form-group">
			      	 	 	<div class="row">
			      	 	 		<div class="col-md-6">
		      	 	 			<select class="form-control" id="industry" name="industry" style="border:solid 1px #4a4a49;border-radius:0px;">
							 		<option value="">Select Industry</option>
							 		<?php 
							          $sqlSelect = $db->query("SELECT * FROM industries ORDER BY industry ASC");
							          while($rows = $sqlSelect->fetch())
							          {
							          	?>
							          	<option value="<?php echo $rows["industry"] ?>"><?php echo $rows["industry"] ?></option>
							          	<?php
							           }
							 		?>
						 	   </select>
			      	 	 		</div>
		                        <div class="col-md-6">
			      	 				<input type="number" name="contactNumber" id="contactNumber" class="form-control" placeholder="Contact Number..." required="required">
			      	 			</div>
			      	 	 	</div>
			      	 	 </div>
			      	 	<div class="form-group">
			      	 		<div class="row">
			      	 			<div class="col-md-6">
			      	 				<input type="text" name="CompanyEmail" id="CompanyEmail" class="form-control" placeholder="Email Address..." required="required">
			      	 			</div>
			      	 			<div class="col-md-6">
			      	 				<input type="text" name="website" id="website" class="form-control" placeholder="website (www.exampe.co.za)" required="required">
			      	 			</div>
			      	 		</div>
			      	 	</div>
			      	 	<div class="form-group">
			      	 		<input type="text" name="physicalAddress" id="physicalAddress" class="form-control" placeholder="Physical Address..." required="required">
			      	 	</div>
			      	 	<div class="form-group">
			      	 		<div class="row">
			      	 			<div class="col-md-6">
			      	 				<input type="text" name="city" id="city" class="form-control" placeholder="City..." required="required">
			      	 			</div>
			      	 			<div class="col-md-6">
			      	 				<input type="text" name="province" id="province" class="form-control" placeholder="Province..." required="required">
			      	 			</div>
			      	 		</div>
			      	 	</div>
			      	 	<div class="form-group">
			      	 		<div class="row">
			      	 			<div class="col-md-6">
			      	 				<input type="number" name="postalCode" id="postalCode" class="form-control" placeholder="Postal Code..." required="required">
			      	 			</div>
			      	 			<div class="col-md-6">
			      	 				
			      	 			</div>
			      	 		</div>
			      	 	</div>
			      	 		      	 	
			      	 	<br>
			      	 	<div class="form-group">
			      	 		<button type="submit" class="btn btn-default" id="submit" name="submit"> <i class="icon ion-plus-circled"></i> Register Here !!</button>
			      	 	</div>
			      	 </form>
			      	 </div>
			      </div>
			<div class="col-md-4">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
	     <div class="carousel-inner" >
	      <div class="item active">
	        <img src="img/bu2.jpg" >
	      </div>
	      <div class="item">
	         <img src="img/bu2.jpg" >
	      </div>
	      <div class="item">
	         <img src="img/bu2.jpg" >
	      </div>
	    </div>
	  </div>
    </div>
  </div>
 </div>
  <br><br> <br><br>
</div>
	 <br><br>
</body>
<?php include('scroll.php');?>
<?php include('footer.php');?>
</html>