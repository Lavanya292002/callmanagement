<?php
use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            $userId = "";
            if (isset($column[0])) {
                $userId = mysqli_real_escape_string($conn, $column[0]);
            }
            $mobilenumber = "";
            if (isset($column[1])) {
                $mobilenumber = mysqli_real_escape_string($conn, $column[1]);
            }
            $name = "";
            if (isset($column[2])) {
                $name = mysqli_real_escape_string($conn, $column[2]);
            }
            $remark = "";
            if (isset($column[3])) {
                $remark = mysqli_real_escape_string($conn, $column[3]);
            }
            $status = "";
            if (isset($column[4])) {
                $status = mysqli_real_escape_string($conn, $column[4]);
            }
            
            $sqlInsert = "INSERT into contacts (userId,mobilenumber,name,remark,status)
                   values (?,?,?,?,?)";
            $paramType = "issss";
            $paramArray = array(
                $userId,
                $mobilenumber,
                $name,
                $remark,
                $status
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (! empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
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
					<form action="" method="post"
					name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
					<div>
						<label style="padding-left: 300px;">Choose Excel
						File</label> <input type="file" name="file"
						id="file" accept=".xls,.xlsx">
						<button type="submit" id="submit" name="import"
						class="btn-submit">Import</button>
					</div>
				</form>  
			</div>
            <div class="row">
		<div class="col-xl-12 col-xxl-12">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header border-0 pb-0">
							<h4 class="mb-0 fs-20 text-black">User's Task Management</h4>
						</div>
						<div class="card-body p-3 pb-0">
                            
							<div class="table-responsive">
								<table id="example3" class="display" style="min-width: 1000px;">
								<?php
            $sqlSelect = "SELECT * FROM contacts";
            $result = $db->select($sqlSelect);
            if (! empty($result)) {
                ?>
        
									<thead>
										<tr>
											<th>User Id</th>
											<th>mobilenumber</th>
											<th>Name</th>
										
										</tr>
									</thead>

									<?php
                
                foreach ($result as $row) {
                    ?>
									<tbody>
										<tr>
											
										<td><?php  echo $row['userId']; ?></td>
                                       <td><?php  echo $row['mobilenumber']; ?></td>
                                       <td><?php  echo $row['name']; ?></td>



										</tr>
										<?php
                }
                ?>
									</tbody>
								</table>
								<?php } ?>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>

</div>
    <!--**********************************
        Main wrapper end
        ***********************************-->

    <!--**********************************
        Scripts
        ***********************************-->
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
        <script src="js/popup.js"></script>

    </body>
    </html>



    