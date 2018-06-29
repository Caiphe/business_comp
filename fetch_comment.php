<?php
 session_start();
 include('db.php');
 $query = ('SELECT * FROM reviewtb ORDER BY review_id DESC ');
 $statement = $db->prepare($query);
 $statement->execute();
 $output = '';
 while($row = $statement->fetchAll())
 {
 	$output .='
      <div class="panel panel-default">
         <div class="panel panel-heading">
           By <b>'.$_SESSION['name'].'</b> on <i>'.$row['reviewDT'].'</i>
         </div>
         <div class="panel-body">'.$row['review'].'</div>         
      </div>
 	';
 }
?>