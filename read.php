<?php
require('connection.php');

?>
<?php include'header.php'
?>
<?php include'sidebar.php'
?>



<div class="content-body">
	<div class="container-fluid">
		<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
		</div>
		<div class="outer-container">
			 
			</div>
            <div class="row">
		<div class="col-xl-12 col-xxl-12">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header border-0 pb-0">
							<h4 class="mb-0 fs-20 text-black">Users List</h4>
						</div>
						<div class="card-body p-3 pb-0">
                            
							<div class="table-responsive">
								<table id="example3" class="display" style="min-width: 1000px;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>username</strong></th>
<th><strong>password</strong></th>
<th><strong>Edit</strong></th>

<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from users ORDER BY id desc;";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["password"]; ?></td>
<td align="center">
<a href="edit.php?id=<?php echo $row["id"]; ?>"  class="btn btn-primary btn-block">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>"  class="btn btn-primary btn-block">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
  <!-- Required vendors -->
  <script src="vendor/global/global.min.js"></script>
        <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="vendor/chart.js/Chart.bundle.min.js"></script>

        <!-- Chart piety plugin files -->
        <script src="vendor/peity/jquery.peity.min.js"></script>

        <!-- Apex Chart -->
        <script src="vendor/apexchart/apexchart.js"></script>

        <!-- Dashboard 1 -->
        <script src="js/dashboard/dashboard-1.js"></script>

        <script src="vendor/owl-carousel/owl.carousel.js"></script>
        <script src="js/custom.min.js"></script>
        <script src="js/deznav-init.js"></script>
        <script src="js/demo.js"></script>
        <script src="js/styleSwitcher.js"></script>
        <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="js/plugins-init/datatables.init.js"></script>
 