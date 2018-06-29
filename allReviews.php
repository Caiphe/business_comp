<?php
session_start();
include('db.php');

$reviewCount = 5;
$reviewreq=$db->query('SELECT review_id FROM reviewtb');
$reviewIdCount = $reviewreq->rowCount();
$totalPage = ceil($reviewIdCount/$reviewCount);

// Pagination
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $totalPage)
{
	$_GET['page'] = intval($_GET['page']);
	$pagecourante = $_GET['page'];
} else{
	$pagecourante = 1;
}
$depart = ($pagecourante-1)*$reviewCount;
// End of Pagination
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>AllReviews</title>
	<style type="text/css">
 body
  {
 	  font-family: 'Sintony', sans-serif;
  }
	#mainDiv
	{
    background-color: #ececec;
    margin-top: -20px;
	}
	#afterMain
	{
    background-color: white;
	}
	
	</style>
</head>
<body>
	<div id="mainDiv">
	<div id="afterMain" class="container">
		<br>
		<p style="font-size: 20px;">All Reviews</p>
		<br>
	</div>
	<br>
   <div class="container" style="background-color: white;">
   	<br>
	  <div class="col-md-12">
	  	<?php
       $queryRev = $db->query('SELECT * FROM reviewtb ORDER BY reviewDT DESC LIMIT '.$depart.','.$reviewCount);
       while($row=$queryRev->fetch())
       {
        $datetime = $row['reviewDT'];
        $title = $row['reviewTitle'];
        $reviewNature = $row['review_nature'];
        $reviewDate = $row['reviewDT'];
        $review = $row['review'];
        $userid = $row['user_id'];
        $rating = $row['rating'];
        $company_name = $row['company_name'];
        
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
        $getdate = date('Y-m-d', strtotime($reviewDate));
        $gettime = date('H:i:s', strtotime($reviewDate));
        $review = '
           <div id="reviewDiv">
              <p id="reviewResult">
                <span style="color:#7d0e19;"><b>'.$company_name.'</b></span><br>
                <span><i>'.$title.'</i></span><br>
                <span>'.$value.'</span><br>
                <span><a href="#">"'.$review.'"</a></span><br>
                <span style="font-size:12px;color:#8b8b8b;">Published on : <i class="icon ion-android-calendar"></i> '.$getdate.' &nbsp; At : <i class="icon ion-ios-alarm-outline"></i> '.$gettime.'</span>
              </p>
           </div>
        ';
        echo $review;
    }
    ?>
  <div style="margin-left: 30%;">
  <nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php 
      for($i=1;$i <= $totalPage;$i++ )
      {
      	if($i == $pagecourante)
      	{
      		echo ' <li class="active"><a href="#">'.$i.' <span class="sr-only">(current)</span></a></li>';
      	}
      	else
      	{
      		echo '<li><a href="allReviews.php?page='.$i.'">'.$i.'</a></li>';
      	}
      }
    ?>
     <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</div>
<br>
</div>
	
   </div>
   <br><br>
	</div>
</body>
<?php include('scroll.php') ?>
<?php include('footer.php') ?>
</html>