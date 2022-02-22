<?php  
	include 'db_connection.php';
	$con = OpenCon();
	if(isset($_GET['empnum'])){
		$emp=$_GET['empnum'];
		$sql = "select emp_id,emp_num,fname,mname,lname,suffix,civil,department,designation,empstatus,quadep from personal_info where emp_num='$emp'";
		$result = mysqli_query($con, $sql);
	}
	else{
		$sql = "select emp_id,emp_num,fname,mname,lname,suffix,civil,department,designation,empstatus,quadep from personal_info;";
		$result = mysqli_query($con, $sql);
	
	}
	

	if($_SERVER["REQUEST_METHOD"]=="POST"){

			if(isset($_POST['ser'])){
				$emps = $_POST['empsearch'];
				if(empty($emps)){
					header("Location: payrolltable.php");
				}
				else{
					header("Location: payrolltable.php?empnum=$emps");
				}
			}
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Employee Payroll List</title>
		<link href="styles/tablestyle.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
		<script src="js/jquery-3.6.0.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('table tr').click(function(){
					var id = $(this).attr('row_id');
					window.location.href = "http://localhost/Doctor/page2.php?row_id="+id;
				});

			});
		</script>
	</head>
	<body></br></br></br>
			<div id="main">
			<h1>EMPLOYEE PAYROLL <span>LIST</span></h1>
			<div class="sea">
			<form method="POST">
			<label for="search" class="lp">Employee Number:</label>
			<input type="text" name="empsearch" id="empsearch" class="ttbox" value="">
			<input type="submit" name="ser" id="ser" class="arbut" value="Search"></div>
			</form>
			<table>
				<thead>
				<tr>
					<th>Employee Number</th>
					<th>Employee Name</th>
					<th>Civil Status</th>
					<th>Department</th>
					<th>Designation</th>
					<th>Employee Status</th>
					<th>Qualified Dependent Status</th>
				<tr>
				<thead>

				
					<?php  if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_assoc($result)){
					?>
				<tbody>
								<tr row_id="<?php echo $row['emp_id']; ?>">
									<td style="border-left:none;"><?php echo $row['emp_num']; ?></td>
									<td><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?> <?php echo $row['suffix'];?></td>
									<td><?php echo $row['civil']; ?></td>
									<td><?php echo $row['department']; ?></td>
									<td><?php echo $row['designation']; ?></td>
									<td><?php echo $row['empstatus']; ?></td>
									<td style="border-right:none;"><?php echo $row['quadep']; ?></td>

								</tr>
				</tbody>

					<?php
						}
						
						
					}
					else {
							echo "<script> alert('No Results!'); </script>";
							
						}
						mysqli_close($con);
					
				  	?>
			</table>
			</div>
		
	</body>
</html>