<?php
  include('db.php');
  if(isset($_GET['user_id']) AND $_GET['user_id'] >0)
  {
   $getid = intval($_GET['user_id']);
   $deleteUser = $db->prepare('DELETE FROM signup WHERE user_id = ?');
   //$dleleteUs =$db->query(" DELETE FROM `signup` WHERE `signup`.`user_id` = 20");
   $deleteUser->execute(array($getid));

   var_dump($getid);

   if($deleteUser)
   {
   ?>
    <script type="text/javascript">
      alert('User Deleted Successfully !!!');
      window.location.href="users.php";
    </script>
   <?php
   }
} 
?>
