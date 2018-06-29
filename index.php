<?php
//Pexels
//Pixabay
//unsplash.com
//picnoi
  session_start();
  include('db.php');
  include('header.php');

  if(isset($_POST['submitSearch']))
  {
     $searchtextBox = htmlspecialchars($_POST["searchtextBox"]);
     if(empty($searchtextBox))
     {
        $errorMsg = "Enter the company you would like to search";
     }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  <link href="https://fonts.googleapis.com/css?family=Khand|Rajdhani|Shrikhand|Sintony" rel="stylesheet">
	<style type="text/css">
   body
   {
     font-family: 'Sintony', sans-serif;
     min-width: 400px;
   }
  #main
  {
    margin-top: -20px;
  }
  .checked 
  {
    color: red;
  }
  .unchecked
  {
     color: #5f6266;
  }

  div.tab 
  {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
  }
  div.tab button 
  {
      background-color: inherit;
      color: #090f32;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 13px;
  }
  div.tab button:hover{
      background-color: #090f32;
      color: white;
  }
  div.tab button.active 
  {
      background-color: #090f32;
      color: white;
  }
  .tabcontent 
  {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
  }
  .centered 
  {
      position: absolute;
      top: 43%;
      right: 21%;
      margin-left:120px;
      width: 60%;
  }
  #submitSearch
  {
     height: 50px;
     padding: 0 15px;
     border-top-right-radius: 15px;
     border-bottom-right-radius:15px;
     border-top : solid 1px #d77c12;
     border-bottom : solid 1px #d77c12;
     border-right:solid 1px #d77c12;
     background-color: #130a42;
  }
  #submitSearch:hover
  {
     background-color: #8245a8;
     font-weight: bold;
     color: #000000;
     font-weight: bold;
  }
  #searchtextBox
  {
    height: 50px;
    background-color:#ededed;
    border-top-left-radius: 15px;
    border-bottom-left-radius:15px;
    border-top : solid 1px #d77c12;
    border-bottom : solid 1px #d77c12;
    border-left:solid 1px #d77c12;
    font-size: 15px;
    font-family: 'Sintony', sans-serif;
  }
  
  #result a
  {
    border-bottom: 1px solid #ddd;
    display: block;
    font-family: 'Sintony', sans-serif;
    padding: 5px;
  }
  #result a:hover
  {
    background-color:#d4d4d6; 
  }
  #searchForm
  {
    min-width: 250px;
    font-family: 'Sintony', sans-serif;
    position: absolute;
  }
  #content
  {
    width: 100%;
    background-color: #ffffff;
    position: relative;
    z-index: 1;
  }
    #first
  {
    background-image: url("img/slid1.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    z-index: -1
    width: 100%;
    height: 500px;
    margin-top: -40px;
  }
  #errorMsg
  {
    text-align: center;
    color: #d51426;
    font-size: 13px;
    padding: 3px 20px;
    background-color: white;
    opacity: 0.7;
    width: 45%;
    -webkit-animation-duration : 1s;
    -webkit-animation-iteration-count:1;
    margin: 2px 20%;
    border-bottom-right-radius: 15px;
    border-top-left-radius: 15px;
  }
  
	</style>
</head>
<script type="text/javascript">
    var ypos,image;
    function parallex(){
      ypos = window.pageYOffset;
      image= document.getElementById('');
      image.style.top = ypos * .7 + 'px';
    }
    window.addEventListener('scroll', parallex);
  </script>
<body>
 <div id="first">
     <div class="centered" id="searchForm">
      <form method="post">
    <div class="input-group">
        <input style="" type="text" class="form-control" placeholder="&nbsp; Search by Company or Industry..." id="searchtextBox" name="searchtextBox">
         <div class="input-group-btn">
        <button class="btn btn-warning" style=" " type="submit" name="submitSearch" id="submitSearch">
          <i class=""><b>SEARCH...</b></i>
        </button><
       </div>
  </div>
   <?php 
          if(isset($errorMsg))
          {
            ?>
            <p id="errorMsg" class="animated flipInY"><i><?php echo $errorMsg; ?></i></p>
            <?php
          }
       ?>
  </form>
    <div style="background:#ffffff;margin-top:3px;" id="result"></div>
</div>
 </div>

<div class="container-fluid" id="content">
   <br><br>
  <div class="container"  id="">
	<div class="row">
	   <div class="col-md-6">
        <div class="progress">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
          <span class="sr-only">75% Complete</span>
         </div>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
          <span class="sr-only">75% Complete</span>
         </div>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
          <span class="sr-only">30% Complete</span>
         </div>
        </div>
         <div class="progress">
          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
          <span class="sr-only">20% Complete</span>
         </div>
        </div>
	   </div>
	   <div class="col-md-6">

      <table>
        <tr>
          <td>
             <span id="green" class="icon ion-ios-star "></span>
             <span id="green" class="icon ion-ios-star "></span>
             <span id="green" class="icon ion-ios-star "></span>
             <span id="green" class="icon ion-ios-star "></span>
             <span id="green" class="icon ion-ios-star "></span>
          </td>
          <td>
             <label> &nbsp; &nbsp; Very Good </label>
          </td>
        </tr>
          <tr>
        <td>
             <span id="lightgreen" class="icon ion-ios-star "></span>
             <span id="lightgreen" class="icon ion-ios-star "></span>
             <span id="lightgreen" class="icon ion-ios-star "></span>
             <span id="lightgreen" class="icon ion-ios-star "></span>
          </td>
          <td>
             <label> &nbsp; &nbsp; Good</label>
          </td>
        </tr>
        <tr>
           <td>
             <span id="orange" class="icon ion-ios-star "></span>
             <span id="orange" class="icon ion-ios-star "></span>
             <span id="orange" class="icon ion-ios-star "></span>
           </td>
           <td>
              <label> &nbsp; &nbsp; Average    </label>
           </td>
        </tr>
        <tr>
          <td>
            <span id="lightorange" class="icon ion-ios-star "></span>
            <span id="lightorange" class="icon ion-ios-star "></span>
          </td>
          <td>
            <label> &nbsp; &nbsp; Bad    </label>
          </td>
        </tr>
        <tr>
           <td>
             <span id="red" class="icon ion-ios-star "></span>
           </td>
           <td>
              <label> &nbsp; &nbsp; Very Bad </label>
           </td>
        </tr>
      </table>
	   </div>
	</div>
</div>
 <!--TABS-->
<div class="container" style="margin-top: 30px;">
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'rev')" id="defaultOpen">Recent Reviews</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Most Viewed Reviews</button>
  <button class="tablinks" onclick="openCity(event, 'marc')">Updated Reviews</button>
  <button class="tablinks" onclick="openCity(event, 'red')">Level up</button>
</div>

<div id="rev" class="tabcontent">
  <div class="container">
    <?php
       $queryRev = $db->query("SELECT * FROM reviewtb ORDER BY reviewDT DESC LIMIT 3");
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
  </div>
</div>

<div id="Tokyo" class="tabcontent">
    <div class="container">
    <?php
       $queryRev = $db->query("SELECT * FROM reviewtb ORDER BY reviewDT DESC LIMIT 3 OFFSET 5");
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
  </div>
</div>

<div id="marc" class="tabcontent">
  <div class="container">
    <?php
       $queryRev = $db->query("SELECT * FROM reviewtb ORDER BY reviewDT DESC LIMIT 2 OFFSET 7");
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
              <span style="color:#7d0e19;"><b><a href="#void">'.$company_name.'</a></b></span><br>
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
  </div>
</div>
</div>
<br>
</div>
</body> 
<?php include('scroll.php');?>
<?php include('footer.php');?>
</html>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) 
    {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) 
    {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

<script >
   $(document).ready(function()
  {
    $('#searchtextBox').keyup(function()
    {
      var search = $('#searchtextBox').val();
      if($.trim(search.length) == 0)
      {
        $('#result').html('');
      }
      else
      {
        $.ajax({
          type : 'POST',
          url  : 'fetchCompany.php',
          data : {'search':search},
          success:function(data)
          {
            $('#result').html(data);
          }
        })
      }
    })
  });
</script>
