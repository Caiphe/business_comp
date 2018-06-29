<?php 
  session_start();
  include('db.php');
  $sqlReviews =$db->query('SELECT * FROM reviewtb ORDER BY reviewDT DESC');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style type="text/css">
    #allinOne
    {
      font-family: 'Abel', sans-serif;
    }
  </style>
</head>
<body id="allinOne">
 <?php include('nav.php') ?>
 <div class="content-wrapper">
 	<div class="container-fluid">
 		<br><br>
 		<ol class="breadcrumb">
         <li class="breadcrumb-item">
           <a href="#">Dashboard</a>
         </li>
        <li class="breadcrumb-item active"><b>All Reviews</b></li>
      </ol>
 		<table class="table table-bordered table-responsive" id="myTable">
 			<thead>
 				<tr>
 					<th>User Id</th>
          <th>User Name</th>
 					<th>Company</th>
 					<th>Rating</th>
 					<th>Title</th>
 					<th>Review</th>
 					<th>Date</th>
 					<th>Edit</th>
 					<th>Del</th>
 				</tr>
 			</thead>
 			<?php
        while($row=$sqlReviews->fetch())
        {
        	?>
          <tr>
          	<td><?= $row['user_id'] ?></td>
            <td><?= $row['user_name'] ?></td>
          	<td><?= $row['company_name'] ?></td>
          	<td><?= $row['rating'] ?></td>
          	<td><?= $row['reviewTitle'] ?></td>
          	<td><?= $row['review'] ?></td>
          	<td><?= $getdate = date('Y-m-d', strtotime($row['reviewDT'])); ?></td>
          	<td><a href="#" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
          	<td><a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
          </tr>
        	<?php
        }
 			?>
 		</table>
 	</div>
 	<br><br><br><br>
 </div>

 <?php include('footer.php') ?>

</body>
</html>
<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable( {
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