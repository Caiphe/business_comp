<?php
session_start();
//$db = new PDO('mysql:host=127.0.0.1;dbname=helloworld', 'root', 'root');
include('db.php');
if(isset($_POST['search']))
{
	$search = $_POST['search'];
	$query = $db->query("SELECT * FROM business WHERE company_name LIKE '%$search%' OR industry LIKE '%$search%' ");
	$count = $query->rowCount();
	if($count == 0)
	{
		echo "<table class='table table-hover'>
       <th style='background-color:#3443a1;color:white;'>Search Result</th>
       <tr>
         <td>No Result found</td>
       <tr>
		</tabale>";
	}
	else
	{
     echo "<table class='table table-hover' style='z-index:99;'>
        <th style='background-color:#3443a1;color:white;'>Search Result</th>
     ";
     while($r=$query->fetch(PDO::FETCH_OBJ))
     	{
     	$name = $r->company_name;
     	$industry = $r->industry;
        $_SESSION['business'] = $r->company_name;
        $_SESSION['industry'] = $r->industry;
        $_SESSION['business_id'] = $r->business_id;
        
     		echo "
            <tr>
              <td><a href='review.php?business_id=".$r->business_id."'>$name</a></td>
            </tr>
     		";
     	}
     	echo "</table>";
	}
}
?>