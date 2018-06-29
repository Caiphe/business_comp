<?php 
  session_start();
  include('nav.php');
  include('db.php');
  $userQuery  = $db->query("SELECT * FROM signup ORDER BY userDateTime DESC");
  $userCheck = $userQuery->rowCount();

  
?>
<!DOCTYPE html>
<html>
<head>
	<title>findIT-user</title>
</head>
<style type="text/css">
	.fa-edit .fa-trash
	{
		font-size: 12px;
	}
	#main
	{
		font-family: 'Abel', sans-serif;
	}
</style>
<body id="main">

	<div class="content-wrapper">
    <div class="container-fluid">
    <div class="container">
      <br><br>
       <ol class="breadcrumb">
         <li class="breadcrumb-item">
           <a href="admin.php">Dashboard</a>
         </li>
        <li class="breadcrumb-item active"><b>Our Users</b></li>
      </ol>
      <!-- Trigger the modal with a button -->
  <br>
      
		<table class="table table-bordered table-responsive" id="example">
			<thead >
				<tr>
					<th>UserID</th>	
					<th>Name</th>			
					<th>Last Name</th>
					<th>Email Address</th>	
					<th>Contact Number</th>	
					<th>Username</th>
					<th>Reg Date & Time</th>
					<th>Edit</th>	
					<th>Del</th>		
				</tr>
			</thead>
			<?php 
			 while($row = $userQuery->fetch())
			 {
			 	  $getdate = date('Y-m-d', strtotime($reviewDate));
			 	  $gettime = date('H:i:s', strtotime($reviewDate));
			  ?>
			 	<tr>
			 		<td><?= $row['user_id']?></td>
			 		<td><?= $row['name']?></td>
			 		<td><?= $row['lastname']?></td>
			 		<td><?= $row['email']?></td>
			 		<td><?= $row['mobile']?></td>
			 		<td><?= $row['username']?></td>
			 		<td><?= $getdate = date('Y-m-d', strtotime($row['userDateTime']));?>/<?= $gettime =date('H:i:s', strtotime($row['userDateTime']));?> </td>
			 		<td><a href="#" class="btn btn-success btn-sm" ><i class="fa fa-edit " ></i></a></td>
			 		<td><a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash " data-toggle="modal" data-target="#myModal"></i></a></td>
			 	</tr>

			  <?php
			 }
			?>
		</table>
        
        <!-- DELETe MODAL-->
        <?php
        $deletequery = $db->query("SELECT * FROM signup ORDER BY user_id DESC LIMIT 1");
       
        ?>
		<div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header" style="background-color: #070d41;color: white;">
	          <p style="text-align: center;font-size: 22px;">are you sure you want to delete this user? <i class="fa fa-trash"></i></p>
	        </div>
	        <div class="modal-body">
             <?php
               while($rows=$deletequery->fetch())
               {
               	 ?>
               	 <a type="button" href="deleteUsers.php?id=<?php echo $rows['user_id']?>" class="btn btn-primary" ><i class="fa fa-trash"></i> Delete</a>
               	 <?php
               }
             ?>
	           <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-plus"></i> Close</button>
	        </div>
	      </div>
    </div>
  </div>
  
</div>
	</div>
   </div>
   <br><br><br>
 </div>
 <?php include('footer.php') ?>
</body>
</html>
 <script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );
} );
</script>