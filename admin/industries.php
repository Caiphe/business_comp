<?php
  session_start();
  include('db.php');

  $queryIndustry = $db->query("SELECT * FROM industries ORDER BY id DESC");
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
 
 <div class="content-wrapper" >
 	<div class="container-fluid">
 		<br><br><br>
 		<table class="table table-bordered table-responsive" id="myTable">
 			<thead>
 				<tr>
 					<th> ID</th>
 					<th>Industry</th>
 					<th>Industry</th>
 					<th>Industry</th>
          <th>Industry</th>
          <th>Industry</th>
          <th>Industry</th>
 					<th>Industry</th>
 					<th>Edit</th>
 					<th>Delete</th>
 				</tr>
 			</thead>
 			<?php 
              while($row = $queryIndustry->fetch())
              {
              	?>
              	<tr>
              		<td><?= $row['id']?></td>
              		<td><?= $row['industry']?></td>
              		<td><?= $row['industry']?></td>
                  <td><?= $row['industry']?></td>
                  <td><?= $row['industry']?></td>
                  <td><?= $row['industry']?></td>
              		<td><?= $row['industry']?></td>
              		<td><?= $row['industry']?></td>
              		<td><a class="btn btn-success" href="#"><i class="fa fa-edit"></i></a></td>
              		<td><a class="btn btn-danger" href="#"><i class="fa fa-trash"></i></a></td>
              	</tr>
              	<?php
              }
 			?>
 		</table>
 	</div>
 </div>
 <br><br><br>

 <?php include('footer.php') ?>
</body>
</html>
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