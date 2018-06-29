<?php
session_start();
//$db = new PDO('mysql:host=127.0.0.1;dbname=helloworld', 'root', 'root');
include('db.php');
if(isset($_POST['search']))
{
  $output = '';
  $search = $_POST['search'];
  $query = $db->query("SELECT * FROM business WHERE company_name LIKE '%$search%' OR industry LIKE '%$search%' ");
  $count = $query->rowCount();
  $output .= '<ul class="list-unstyled">'
  if($count == 0)
  {
    $output.= '<li>Company Name Not Found</li>';
  }
  else
  {
     while($r=$query->fetch(PDO::FETCH_OBJ))
      {
        $name = $r->company_name;
        $industry = $r->industry;
        $_SESSION['business'] = $r->company_name;
        $_SESSION['industry'] = $r->industry;
        $_SESSION['business_id'] = $r->business_id;
        
       $output.='<li>'.$r["company_name"].'</li>';
      }
     $output .='</ul>';

     echo $output;
  }
}
?>