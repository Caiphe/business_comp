<?php 
  session_start();
  include('db.php');
  include('nav.php');
  $sqlBusiness=$db->query('SELECT * FROM business ORDER BY date_Time DESC');

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <div class="content-wrapper">
    <div class="container-fluid">
    	<br><br>
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
           <a href="#">Dashboard</a>
         </li>
        <li class="breadcrumb-item active"><b>Registered Reviews</b></li>
      </ol>

      <table class="table table-bordered table-responsive" id="myTable">
          <thead>
            <tr>
               <th>Company</th>
               <th>Industry</th>
               <th>Contact</th>
               <th>Email</th>
               <th>Website</th>
               <th>City</th>
               <th>Province</th>
               <th>Edit</th>
               <th>Del</th>
           </tr>
          </thead>
      <?php
       while($row = $sqlBusiness->fetch())
       {
         ?>
           <tr>
             <td><?= $row['company_name']?></td>
             <td><?= $row['industry']?></td>
             <td><?= $row['contact_number']?></td>
             <td><?= $row['company_email']?></td>
             <td><?= $row['website']?></td>
             <td><?= $row['city']?></td>
             <td><?= $row['province']?></td>
             <td><a href="#" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
             <td><a data-target="#mal" data-toggle="modal"  type="button" class="btn btn-danger btn-xs" value="View" style="font-size:14px;"><i class="fa fa-trash"></i></a></td>
           </tr>
         <?php
       }
      ?>
    	  </table>

    <!--Delete Modal-->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>
    
<br><br><br>
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